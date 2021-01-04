<?php

namespace App;

use App\Traits\HasUrlCode;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasUrlCode;
    public function files()
    {
        return $this->hasMany('App\PostFile');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function votes()
    {
        return $this->morphMany('App\Vote', 'votable');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment')->whereNull('parent_id');
    }
    public function urlcode()
    {
        return $this->morphOne('App\Urlcode', 'codable');
    }
    public function community()
    {
        return $this->belongsToMany('App\Community', 'post_community');
    }
    public function upvotes()
    {
        return $this->votes()->where('up', true)->count() - $this->votes()->where('up', false)->count();
    }
}
