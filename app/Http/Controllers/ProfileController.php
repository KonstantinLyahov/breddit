<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getOverview($code)
    {
        $user = User::findByCode($code);
        return view('profile/overview', ['user' => $user]);
    }
    public function getPosts($code)
    {
        $user = User::findByCode($code);
        $posts = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->simplePaginate(10);
        return view('profile/posts', ['user' => $user, 'posts' => $posts]);
    }
    public function getComments($code)
    {
        $user = User::findByCode($code);
        $comments = $user->comments()->orderBy('created_at', 'desc')->simplePaginate(10);
        return view('profile/comments', ['user' => $user, 'comments' => $comments]);
    }
    public function getUpvoted($code)
    {
        $user = User::findByCode($code);
        if (Auth::user() != $user) {
            return redirect()->route('profile.overview', ['code' => $code]);
        }
        $upvoted = $user->votes()->where('up', true)->get();
        return view('profile/voted', ['user' => $user, 'voted' => $upvoted]);
    }
    public function getDownvoted($code)
    {
        $user = User::findByCode($code);
        if (Auth::user() != $user) {
            return redirect()->route('profile.overview', ['code' => $code]);
        }
        $downvoted = $user->votes()->where('up', false)->get();
        return view('profile/voted', ['user' => $user, 'voted' => $downvoted]);
    }
}
