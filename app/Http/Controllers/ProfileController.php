<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getProfile($user_id)
    {
        $user = User::find($user_id);
        $posts = Post::where('user_id', $user_id)->orderBy('created_at', 'desc')->simplePaginate(10);
        return view('profile', ['user' => $user, 'posts'=>$posts]);
    }
}
