<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

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
        $vote = $user->votes()->where('votable_id', $request->postId)->where('votable_type', 'App\Post')->first();        
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
        $vote->votable_id = $request->postId;
        $vote->votable_type = 'App\Post';
        $vote->up = $up;
        $vote->save();
        return response()->json(['action' => 'inserted'], 200);
    }
    public function postCreateComment(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->post_id;
        $comment->body = $request->body;
        $comment->save();
        return redirect()->back();
    }
    public function postReplyComment(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->postId;
        $comment->body = $request->body;
        $comment->parent_id = $request->parentId;
        $comment->save();
        return redirect()->back();
    }
    public function postVoteComment(Request $request)
    {
        $up = filter_var($request->up, FILTER_VALIDATE_BOOLEAN);
        $user = Auth::user();
        $vote = $user->votes()->where('votable_id', $request->commentId)->where('votable_type', 'App\Comment')->first();        
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
        $vote->votable_id = $request->commentId;
        $vote->votable_type = 'App\Comment';
        $vote->up = $up;
        $vote->save();
        return response()->json(['action' => 'inserted'], 200);
    }
}
