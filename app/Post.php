<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
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
}
