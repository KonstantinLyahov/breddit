<?php

namespace App\Http\Controllers;

use App\Community;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CommunityController extends Controller
{
    public function getIndexPage()
    {
        $communities = Community::all();
        return view('communities/index', ['communities' => $communities]);
    }
    public function getCreatePage()
    {
        return view('communities/create');
    }
    public function postCreate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:15|unique:communities|alpha|regex:/^[a-zA-Z]+$/',
            'description' => 'required',
            'image' => 'required|max:10000|mimes:png,gif,jpeg,jpg'
        ]);
        do{
            $storeFileName = substr(base64_encode(sha1(mt_rand())), 0, 6) . '.' . $request['image']->extension();
        }  while(Community::where('name', 'like', $storeFileName)->first());
        $request['image']->storeAs('public/uploads/community_images', $storeFileName);
        $community = new Community();
        $community->name = $request['name'];
        $community->description = $request['description'];
        $community->image_path = 'uploads/community_images/'.$storeFileName;
        $community->save();
        $community->addMember(Auth::user()->id, 'creator');
        return view('communities/created');
    }
    public function getCommmunityPage($name)
    {
        $community = Community::where('name', $name)->first();
        return view('communities/community', ['community' => $community]);
    }
    public function postToggleFollow(Request $request)
    {
        $community = Community::find($request->communityId);
        $community->toggleFollow(Auth::user());
        return response('OK', 200);   
    }
}
