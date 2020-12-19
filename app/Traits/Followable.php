<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait Followable {
	public function toggleFollow($followerId, $followableId, $followableType) {
		if($following = DB::table('followers')->where('followable_type', $followableType)->where('followable_id', $followableId)->where('user_id', $followerId)->first()) {
			DB::table('followers')->delete($following->id);
			return false;
	  }
	  DB::table('followers')->insertGetId(['followable_type' => $followableType, 'followable_id' => $followableId , 'user_id' => $followerId]);
	  return true;
	}
}