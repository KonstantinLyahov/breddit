<?php

namespace App;

use App\Traits\Followable;
use App\Traits\HasUrlCode;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasUrlCode, Followable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function votes()
    {
        return $this->hasMany('App\Vote');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function urlcode()
    {
        return $this->morphOne('App\Urlcode', 'codable');
    }
    public function communities()
    {
        return $this->belongsToMany('App\Community', 'community_user', 'user_id', 'community_id');
    }
    public function communityRoles()
    {
        return $this->belongsToMany('App\CommunityRole', 'community_user', 'user_id', 'community_role_id');
    }
    public function followers()
    {
        return $this->morphToMany('App\User', 'followable', 'followers');
    }
    public function followingUsers()
    {
        return $this->morphedByMany('App\User', 'followable', 'followers');
    }
    public function followingCommunities()
    {
        return $this->morphedByMany('App\Community', 'followable', 'followers');
    }
    public function following()
    {
        return $this->followingUsers->union($this->followingCommunities);
    }
}
