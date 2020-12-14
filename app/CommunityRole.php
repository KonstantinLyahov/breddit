<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommunityRole extends Model
{
    protected $fillable = ['role'];
    public function users()
    {
        return $this->belongsToMany('App\User', 'community_user', 'community_role_id', 'user_id');
    }
}
