<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    public function users(){
        return $this->belongsToMany('App\User', 'community_user', 'community_id', 'user_id');
    }
}
