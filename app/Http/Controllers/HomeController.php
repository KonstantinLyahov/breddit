<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use phpDocumentor\Reflection\Types\Null_;

class HomeController extends Controller
{
    private $postLimit = 10;
    
    public function getNew()
    {
        $posts = Post::orderBy('created_at', 'desc')->simplePaginate($this->postLimit);
        return view('home', ['posts' => $posts]);
    }
}
