<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;
use phpDocumentor\Reflection\Types\Null_;

class HomeController extends Controller
{
    private $postLimit = 10;

    public function getNew()
    {
        $posts = Post::orderBy('created_at', 'desc')->simplePaginate($this->postLimit);
        return view('home', ['posts' => $posts]);
    }

    public function getSearch(Request $request)
    {        
        $users = User::where('name', 'like', '%' . $request->search . '%')->get();
        return view('search', ['users' => $users]);
    }
}
