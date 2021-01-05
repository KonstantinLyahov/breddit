<?php

namespace App\Http\Controllers;

use App\Community;
use App\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $postLimit = 10;

    public function getNew()
    {
        $posts = $this->getPosts();
        $posts = $posts->sortBy('created_at', SORT_REGULAR, true);
        $posts = new Paginator($posts, $this->postLimit);
        return view('home', ['posts' => $posts]);
    }
    public function getBest()
    {
        $posts = $this->getPosts();
        $posts = $posts->sortBy(function($post){
            return $post->upvotes();
        }, SORT_REGULAR, true);
        $posts = new Paginator($posts, $this->postLimit);
        return view('home', ['posts' => $posts]);
    }
    public function getSearch(Request $request)
    {        
        $users = User::where('name', 'like', '%' . $request->search . '%')->get();
        $communities = Community::where('name', 'like', '%' . $request->search . '%')->get();
        return view('search', ['users' => $users, 'communities' => $communities, 'search' => $request->search]);
    }

    private function getPosts() {
        $posts = collect();
        $communities = Auth::user()->followingCommunities;
        foreach($communities as $community) {
            $posts->push(...$community->posts->all());
        }
        $users = Auth::user()->followingUsers;
        foreach($users as $user) {
            $posts->push(...$user->posts->all());
        }
        return $posts;
    }
}
