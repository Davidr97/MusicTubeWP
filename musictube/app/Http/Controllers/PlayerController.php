<?php

namespace MusicTube\Http\Controllers;

use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use MusicTube\Album;
use MusicTube\Artist;
use MusicTube\Comment;
use MusicTube\Listened;
use MusicTube\Track;
use MusicTube\Track_Status;

class PlayerController extends Controller
{

    public function search_by_track($name) {
        return Track::where('name' , 'like', '%' . $name . '%')->get()->sortByDesc(function($track){
            return $track->listened_by->count();
        });
    }

    public function search_by_album($name) {
        return Album::where('name' , 'like', '%' . $name . '%')
                        ->get()
                        ->flatMap(function($album){
                                    return $album->tracks;
                                })
                        ->sortByDesc(function($track){
                            return $track->listened_by->count();
                        });
    }

    public function search_by_artist($name) {
        return Artist::where('name' , 'like', '%' . $name . '%')
                        ->get()
                        ->flatMap(function($artist){
                            return $artist->albums;
                        })
                        ->flatMap(function($album){
                            return $album->tracks;
                        })
                        ->sortByDesc(function($track){
                            return $track->listened_by->count();
                        });
    }

    public function search(Request $request){
        $search_name = $request['search_name'];
        $type = $request['search_type'];
        if($type == 1){
            $tracks = $this->search_by_track($search_name);
            $albums = $this->search_by_album($search_name);
            $artists = $this->search_by_artist($search_name);
            $all_tracks = collect($tracks)->merge($albums)->merge($artists)->unique();
        } else if($type == 2) {
            $all_tracks = $this->search_by_track($search_name);
        } else if($type == 3) {
            $all_tracks = $this->search_by_album($search_name);
        } else if($type == 4) {
            $all_tracks = $this->search_by_artist($search_name);
        }
        return view('player.search', compact('all_tracks'));
    }

    public function getAudio($id)
    {
        $track = Track::find($id);
        $name = $track->name;
        $email = $track->user_id->email;
        $path = 'tracks/' . $email . '/' . $name;

        $file=Storage::disk('local')->get($path);

        return response($file)
            ->withHeaders([
                'Content-Type' => "audio/mpeg",
            ]);
    }

    public function loadSong($id){
        $track = Track::find($id);

        $related = $this->get_realated($id);

        $comments=Comment::where('track_id',$id)
            ->where('replied_to_id',null)
            ->with('replies')
            ->with('replies.written_by')
            ->with('replies.likes')
            ->with('replies.dislikes')
            ->with('written_by')
            ->with('likes')
            ->with('dislikes')->get();

        if(Auth::check()) {
            $user_id = Auth::id();
            $listned = DB::table('listened')->where([
                ['user_id', '=', "$user_id"],
                ['track_id', '=', "$id"]
            ])->first();
            if($listned == null) {
                $listned = new Listened();
                $listned->times = 1;
                $listned->track_id = $id;
                $listned->user_id = $user_id;
                $listned->save();
            } else {
                DB::table('listened')->where([
                    ['user_id', '=', "$user_id"],
                    ['track_id', '=', "$id"]
                ])->update([
                    'times' => $listned->times+1,
                    'updated_at' => DB::raw('NOW()')
                ]);
            }
        }

        return view("player.song", compact('track', 'related','comments'));
    }

    public function likeSong(Request $request) {
        $user_id = $request['user_id'];
        $song_id = $request['song_id'];
        $track = DB::table('Track_Status')->where([
            ['user_id', '=',"$user_id"],
            ['track_id', '=',"$song_id"],
        ])->first();
        if($track == null) {
            $track = new Track_Status();
            $track->type=1;
            $track->user_id = $user_id;
            $track->track_id=$song_id;
            $track->save();
        } else if($track->type==0){
            DB::table('Track_Status')->where([
                ['user_id', '=',"$user_id"],
                ['track_id', '=',"$song_id"],
            ])->update(['type' => 1]);
        }
        return $track = DB::table('Track_Status')
            ->where('track_id', '=',"$song_id")
            ->get();
    }

    public function dislikeSong(Request $request) {
        $user_id = $request['user_id'];
        $song_id = $request['song_id'];
        $track = DB::table('Track_Status')->where([
            ['user_id', '=',"$user_id"],
            ['track_id', '=',"$song_id"],
        ])->first();
        if($track == null) {
            $track = new Track_Status();
            $track->type=0;
            $track->user_id = $user_id;
            $track->track_id=$song_id;
            $track->save();
        } else if($track->type==1){
            DB::table('Track_Status')->where([
                ['user_id', '=',"$user_id"],
                ['track_id', '=',"$song_id"],
            ])->update(['type' => '0']);
        }
        return $track = DB::table('Track_Status')
            ->where('track_id', '=',"$song_id")
            ->get();
    }

    public function get_realated($track_id) {
        $track = Track::find($track_id);
        $track_genres = DB::table('track_genre')
            ->where('track_id',$track_id)
            ->join('genre', 'track_genre.genre_id', '=', 'genre.id')
            ->pluck('genre.name')
            ->toArray();
        array_push($track_genres, NULL);

        if(Auth::check()){
            $user_id = Auth::id();
            $most_listened = DB::table('listened')
                                ->where('user_id', '=', $user_id)
                                ->orderByDesc('times')
                                ->join('track', 'listened.track_id','=','track.id')
                                ->join('track_genre', 'listened.track_id', '=', 'track_genre.track_id', 'LEFT')
                                ->join('genre', 'track_genre.genre_id','=', 'genre.id','LEFT')
                                ->join('album', 'track.album_id', '=', 'album.id')
                                //->whereIn('genre.name', $track_genres)
                                ->select([
                                    'track.id',
                                    'track.name',
                                    'track.lyrics',
                                    'track.description',
                                    'track.album_id',
                                    'track.uploaded_by',
                                    'album.cover_photo_url',
                                    'genre.name as genre_name',
                                    'listened.times',
                                    'album.name as album_name'
                                ])
                                ->distinct()
                                ->limit(10)
                                ->get();

            return $most_listened;
        }

        $related = DB::table('listened')
            ->orderByDesc('times')
            ->join('track', 'listened.track_id','=','track.id')
            ->join('track_genre', 'listened.track_id', '=', 'track_genre.track_id', 'LEFT')
            ->join('genre', 'track_genre.genre_id','=', 'genre.id','LEFT')
            ->join('album', 'track.album_id', '=', 'album.id')
            //->whereIn('genre.name', $track_genres)
            ->select([
                'track.id',
                'track.name',
                'track.lyrics',
                'track.description',
                'track.album_id',
                'track.uploaded_by',
                'album.cover_photo_url',
                'genre.name as genre_name',
                'listened.times',
                'album.name as album_name'
            ])
            ->distinct()
            ->limit(10)
            ->get();

        return $related;
    }

    public function history() {
        $user_id = Auth::id();
        $all_tracks =  Listened::where("user_id",'=', $user_id)
                        ->orderByDesc('listened.updated_at')
                        ->join('track','listened.track_id','=','track.id')
                        ->join('users','track.uploaded_by','=','users.id')
                        ->join('album','track.album_id','=','album.id')
                        ->select([
                            'track.id',
                            'track.name',
                            'track.lyrics',
                            'track.description',
                            'track.album_id',
                            'track.uploaded_by',
                            'users.name as uploader',
                            'album.cover_photo_url'
                        ])
                        ->limit(10)
                        ->get();
        return view('statistics.history', compact("all_tracks"));
    }

    public function trending() {
        $all_tracks =  Track::orderByDesc('created_at')
                            ->limit(10)
                            ->get();
        return view('statistics.trending', compact('all_tracks'));
    }
}
