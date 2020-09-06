<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostFile extends Model
{
    public function file()
    {
        return $this->belongsTo('App\Post');
    }
}
