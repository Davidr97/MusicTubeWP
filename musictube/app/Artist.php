<?php

namespace MusicTube;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $table="Artist";

    public function albums()
    {
        return $this->hasMany('MusicTube\Album','artist_id','id');
    }

    public function number_of_tracks() {
        return $this->albums->sum(function($album){
            return Album::find($album->id)->tracks->count();
        });
    }
}
