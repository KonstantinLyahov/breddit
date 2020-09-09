<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostFile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

class SubmitController extends Controller
{
    public function getSubmitPage()
    {
        return view('submit/submit');
    }
    public function postSubmit(Request $request)
    {
        $this->validate($request, [
            'title' => 'required:max:30',
            'files,*' => 'mimes: png, gif, jpeg, mp4, quicktime|max: 10000'
        ]);
        $post = new Post();
        $post->title=$request->title;
        $post->body = $request->body;
        $post->user_id = Auth::user()->id;
        $post->save();
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filenamewithextension = $file->getClientOriginalName();
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
                $extension =$file->getClientOriginalExtension();
                $filenametostore = md5($filename) . '_' . time() . '.' . $extension;
                $file->storeAs('public/uploads', $filenametostore);
                $postFile = new PostFile();
                $postFile->path = 'uploads/'.$filenametostore;
                $post->files()->save($postFile);
            }
        }
        return view('submit/created');
    }
}
