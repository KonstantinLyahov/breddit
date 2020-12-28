<?php

namespace App\Traits;

use App\User;
use Illuminate\Support\Facades\DB;

trait Followable
{
	public function toggleFollow($user)
	{
		if ($this->followers->contains($user)) {
			DB::table('followers')->where('followable_type', static::class)->where('user_id', $user->id)->delete();
		} else {
			$this->followers()->save($user);
		}
	}
}
