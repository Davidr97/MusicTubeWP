<?php

namespace MusicTube;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table="Comment";

    public function track()
    {
        return $this->belongsTo('MusicTube\Track','track_id');
    }

    public function written_by()
    {
        return $this->belongsTo('MusicTube\User','user_id');
    }

    public function comment_status()
    {
        return $this->hasMany('MusicTube\Comment_Status','comment_id','id');
    }

    public function likes() {
        return $this->comment_status()->where('type', '=','1');
    }

    public function dislikes() {
        return $this->comment_status()->where('type', '=','0');
    }
    public function reply_to()
    {
        return $this->belongsTo('MusicTube\Comment','replied_to_id');
    }

    public function replies()
    {
        return $this->hasMany('MusicTube\Comment','replied_to_id','id');
    }
}
