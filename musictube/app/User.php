<?php

namespace MusicTube;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','surname','avatar_url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function subscribers()
    {
        return $this->hasMany('MusicTube\Subscribe','subscriber_id','id');
    }
    public function subscribed_to()
    {
        return $this->hasMany('MusicTube\Subscribe','subscriber_to_id','id');
    }
    public function listened_to()
    {
        return $this->hasMany('MusicTube\Listened','user_id','id');
    }
    public function tracks()
    {
        return $this->hasMany('MusicTube\Track','uploaded_by','id');
    }
    public function track_status()
    {
        return $this->hasMany('MusicTube\Track_Status','user_id','id');
    }
    public function commented()
    {
        return $this->hasMany('MusicTube\Comment','user_id','id');
    }
    public function comment_status()
    {
        return $this->hasMany('MusicTube\Comment_Status','user_id','id');
    }


}
