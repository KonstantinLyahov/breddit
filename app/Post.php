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
        return $this->hasMany('App\Vote');
    }
}
