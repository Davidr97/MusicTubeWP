<?php

namespace MusicTube;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table="Album";

    public function artist()
    {
        return $this->belongsTo('MusicTube\Artist','artist_id');
    }

    public function tracks()
    {
        return $this->hasMany('MusicTube\Track','album_id','id');
    }
}
