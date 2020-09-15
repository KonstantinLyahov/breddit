<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class HomeController extends Controller
{
    private $postLimit = 10;

    public function getNew()
    {
        $post = Post::find(1);
        
        $vote = new \App\Vote;
        $vote->up=true;
        $vote->user_id=Auth::user()->id;
        $post->votes()->save($vote);
        $posts = Post::orderBy('created_at', 'desc')->simplePaginate($this->postLimit);
        return view('home', ['posts' => $posts]);
    }
}
