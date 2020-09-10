<?php

namespace App\Http\Controllers;

use App\Post;
use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function getPost($post_id)
    {
        $post = Post::find($post_id);
        return view('post', ['post' => $post]);
    }
    public function postVote(Request $request)
    {
        $up = filter_var($request->up, FILTER_VALIDATE_BOOLEAN);
        $user = Auth::user();
        $vote = $user->votes()->where('post_id', $request->postId)->first();        
        if ($vote !== null) {
            if($vote->up == $up) {
                $vote->delete();
                return response()->json(['action' => 'deleted'], 200);
            }
            $vote->up = $up;
            $vote->update();
            return response()->json(['action' => 'updated'], 200);
        }
        $vote = new Vote();
        $vote->user_id = $user->id;
        $vote->post_id = $request->postId;
        $vote->up = $up;
        $vote->save();
        return response()->json(['action' => 'inserted'], 200);
    }
}
