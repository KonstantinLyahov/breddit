<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function getUpvoted($user_id)
    {
        $user = User::find($user_id);
        if(Auth::user()!=$user){
            return redirect()->route('profile.overview', ['user_id'=>$user_id]);
        }
        $upvoted = $user->votes()->where('up', true)->get();
        return view('profile/voted', ['user' => $user ,'voted' => $upvoted]);
    }
    public function getDownvoted($user_id)
    {
        $user = User::find($user_id);
        if(Auth::user()!=$user){
            return redirect()->route('profile.overview', ['user_id'=>$user_id]);
        }
        $downvoted = $user->votes()->where('up', false)->get();
        return view('profile/voted', ['user' => $user ,'voted' => $downvoted]);
    }
}
