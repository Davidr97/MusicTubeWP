<?php

namespace MusicTube\Http\Controllers;

use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function mostListenedTracks()
    {
        $tracks = DB::table('Listened')
                ->join('Track', 'listened.track_id','=','track.id')
                ->join('Album','track.album_id','=','album.id')
                ->join('Artist','album.artist_id','=','artist.id')
                ->select('track.id','track.name','track.lyrics','track.description','album.cover_photo_url as image','artist.name as artistName',DB::raw('SUM(times) as times'))
                ->groupBy('id')
                ->orderBy('times','desc')
                ->take(10)
                ->get();
        return $tracks;
    }

    public function mostLikedTracks()
    {
        $tracks = DB::table('Track_Status')
            ->join('Track', 'track_status.track_id','=','track.id')
            ->join('Album','track.album_id','=','album.id')
            ->join('Artist','album.artist_id','=','artist.id')
            ->where('type', 1)
            ->select('track.id','track.name','track.lyrics','track.description','album.cover_photo_url as image','artist.name as artistName',DB::raw('COUNT(*) as times'))
            ->groupBy('id')
            ->orderBy('times','desc')
            ->take(10)
            ->get();
        return $tracks;
    }

    public function mostDislikedTracks()
    {
        $tracks = DB::table('Track_Status')
            ->join('Track', 'track_status.track_id','=','track.id')
            ->join('Album','track.album_id','=','album.id')
            ->join('Artist','album.artist_id','=','artist.id')
            ->where('type', 0)
            ->select('track.id','track.name','track.lyrics','track.description','album.cover_photo_url as image','artist.name as artistName',DB::raw('COUNT(*) as times'))
            ->groupBy('id')
            ->orderBy('times','desc')
            ->take(10)
            ->get();
        return $tracks;
    }

    public function mostReleasedTracksByArtist()
    {
        $tracks = DB::table('Track')
            ->join('Album','track.album_id','=','album.id')
            ->join('Artist','album.artist_id','=','artist.id')
            ->select('artist.id','artist.name','artist.country','artist.photo_url','artist.year_formed','artist.description','artist.is_band',DB::raw('COUNT(*) as times'))
            ->groupBy('artist.id')
            ->orderBy('times','desc')
            ->take(10)
            ->get();
        return $tracks;
    }

    public function mostReleasedAlbumsByArtist()
    {
        $albums = DB::table('Album')
            ->join('Artist','album.artist_id','=','artist.id')
            ->select('artist.id','artist.name','artist.country','artist.photo_url','artist.year_formed','artist.description','artist.is_band',DB::raw('COUNT(*) as times'))
            ->groupBy('artist.id')
            ->orderBy('times','desc')
            ->take(10)
            ->get();
        return $albums;
    }

    public function mostRecentTracks()
    {
        $tracks = DB::table('Track')
            ->join('Album','track.album_id','=','album.id')
            ->join('Artist','album.artist_id','=','artist.id')
            ->select('track.id','track.name','track.lyrics','track.description','album.cover_photo_url as image','artist.name as artistName','track.created_at')
            ->orderBy('track.created_at','desc')
            ->take(10)
            ->get();
        return $tracks;
    }

    public function mostRecentAlbums()
    {
        $albums = DB::table('Album')
            ->select('id','name','year_released','cover_photo_url','created_at')
            ->orderBy('created_at','desc')
            ->take(10)
            ->get();
        return $albums;
    }

    public function numberOfTracksByGenre()
    {
        $genres = DB::table('Track_Genre')
            ->join('Genre','track_genre.genre_id','=','genre.id')
            ->select('genre.name', DB::raw('COUNT(*) as times'))
            ->groupBy('genre.name')
            ->orderBy('times','desc')
            ->take(10)
            ->get();
        return $genres;
    }

    public function viewStatistics()
    {
        $tracks = $this->mostListenedTracks();
        return view('statistics.index', compact('tracks'));
    }
}
