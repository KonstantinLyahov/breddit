<?php

namespace App\Http\Controllers;

use App\Community;
use App\Post;
use App\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    private $perPage = 3;

    public function getHome($sort = 'new')
    {
        $posts = $this->getPosts();
        if ($sort == 'new') {
            $posts = $posts->sortBy('created_at', SORT_REGULAR, true);
        } else if ($sort == 'best') {
            $posts = $posts->sortBy(function ($post) {
                return $post->upvotes();
            }, SORT_REGULAR, true);
        } else {
        }
        $posts = $this->paginatePosts($posts);
        // dd($posts->toArray());
        return view('home', ['posts' => $posts, 'sort' => $sort, 'title' => 'Home', 'route' => 'home']);
    }

    public function getAll($sort = 'new')
    {
        $posts = Post::all();
        if ($sort == 'new') {
            $posts = $posts->sortBy('created_at', SORT_REGULAR, true);
        } else if ($sort == 'best') {
            $posts = $posts->sortBy(function ($post) {
                return $post->upvotes();
            }, SORT_REGULAR, true);
        } else {
        }
        $posts = $this->paginatePosts($posts);
        return view('home', ['posts' => $posts, 'sort' => $sort, 'title' => 'All', 'route' => 'all']);
    }

    public function getSearch(Request $request)
    {
        $users = User::where('name', 'like', '%' . $request->search . '%')->get();
        $communities = Community::where('name', 'like', '%' . $request->search . '%')->get();
        return view('search', ['users' => $users, 'communities' => $communities, 'search' => $request->search]);
    }

    private function getPosts()
    {
        $posts = collect();
        $communities = Auth::user()->followingCommunities;
        foreach ($communities as $community) {
            $posts->push(...$community->posts->all());
        }
        $users = Auth::user()->followingUsers;
        foreach ($users as $user) {
            $posts->push(...$user->posts->all());
        }
        return $posts;
    }

    private function paginatePosts($posts)
    {
        $currentPage = Paginator::resolveCurrentPage();
        $posts = $posts->slice(($currentPage * $this->perPage) - $this->perPage);
        $posts = new Paginator($posts, $this->perPage, $currentPage);
        $posts->setPath('');
        return $posts;
    }
}
