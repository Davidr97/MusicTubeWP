<?php

namespace MusicTube;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $table="Track";

    protected $guarded = [];

    public function album()
    {
        return $this->belongsTo('MusicTube\Album','album_id');
    }

    public function track_genres()
    {
        return $this->hasMany('MusicTube\Track_Genre','track_id','id');
    }

    public function listened_by()
    {
        return $this->hasMany('MusicTube\Listened','track_id','id');
    }

    public function user_id()
    {
        return $this->belongsTo('MusicTube\User','uploaded_by');
    }

    public function track_status()
    {
        return $this->hasMany('MusicTube\Track_Status','track_id','id');
    }

    public function comments()
    {
        return $this->hasMany('MusicTube\Comment','track_id','id');
    }

    public function likes() {
        return $this->track_status()->where('type', '=','1');
    }

    public function dislikes() {
        return $this->track_status()->where('type', '=','0');
    }
}
