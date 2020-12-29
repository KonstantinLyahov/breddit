<?php

namespace App;

use App\Traits\Followable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Community extends Model
{
    use Followable;
    public function users(){
        return $this->belongsToMany('App\User', 'community_user', 'community_id', 'user_id');
    }
    public function followers()
    {
        return $this->morphToMany('App\User', 'followable', 'followers');
    }
    public function posts()
    {
        return $this->belongsToMany('App\Post', 'post_community');
    }
    public function addMember($user_id, $role)
    {
        $role_id = null;
        if(gettype($role) == 'integer' && CommunityRole::where('id', $role)->get()) {
            $role_id = $role;
        } else {
            $role = CommunityRole::where('role', $role)->first();
            $role_id = $role->id;
        }
        if(!$role_id) {
            return false;
        }
        DB::table('community_user')->insert([
            'community_id' => $this->id,
            'user_id' => $user_id,
            'community_role_id' => $role_id
        ]);
        return true;
    }
}
