<?php

namespace MusicTube;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = "Genre";

    public function tracks()
    {
        return $this->hasMany('MusicTube\Track_Genre','genre_id','id');
    }
}
