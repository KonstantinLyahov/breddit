<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getOverview($user_id)
    {
        $user = User::find($user_id);
        return view('profile/overview', ['user' => $user]);
    }
    public function getPosts($user_id)
    {
        $user = User::find($user_id);
        $posts = Post::where('user_id', $user_id)->orderBy('created_at', 'desc')->simplePaginate(10);
        return view('profile/posts', ['user' => $user, 'posts' => $posts]);
    }
    public function getComments($user_id)
    {
        $user = User::find($user_id);
        $comments = $user->comments()->orderBy('created_at', 'desc')->simplePaginate(10);
        return view('profile/comments', ['user' => $user, 'comments' => $comments]);
    }
}
