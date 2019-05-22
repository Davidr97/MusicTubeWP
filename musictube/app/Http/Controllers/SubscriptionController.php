<?php

namespace MusicTube\Http\Controllers;



use Illuminate\Support\Facades\DB;
use MusicTube\Subscribe;

class SubscriptionController extends Controller
{
    public function index(){
        $users = DB::table('subscribe')
            ->join('users','subscribe.subscribed_to_id','=','users.id')
            ->where('subscriber_id','=',auth()->user()->id)
            ->select('users.id','users.name','users.surname','users.email','users.avatar_url')
            ->get();
        return view('subscribe.index',compact('users'));
    }

    public function viewTracks($id){
        $all_tracks =  DB::table('track')
            ->where('track.uploaded_by','=',$id)
            ->orderByDesc('track.created_at')
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
        return view('subscribe.tracks', compact("all_tracks"));
    }

    public function subscribe($id){
        if(auth()->user()){
            $user_id = auth()->user()->id;
            $uploaded_by = DB::table('track')
                    ->where('track.id','=',$id)
                    ->select('track.uploaded_by')
                    ->first()
                    ->{"uploaded_by"};
            if(!DB::table('subscribe')
                ->where([
                    ['subscriber_id','=',$user_id],
                    ['subscribed_to_id','=',$uploaded_by]
                ])
                ->exists()){
                $subscription = new Subscribe;
                $subscription->subscriber_id = $user_id;
                $subscription->subscribed_to_id = $uploaded_by;
                $subscription->save();
            }
            return redirect()->action(
                'SubscriptionController@viewTracks',['id' => $uploaded_by]
            );

        }else{
            return redirect()->route('login');
        }
    }
}
