<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SubmitController extends Controller
{
    public function getSubmitPage()
    {
        return view('submit/submit');
    }
    public function postSubmit(Request $request)
    {
        if ($request->hasFile('files')) {
            foreach($request->allFiles('files') as $file) {
               var_dump($file);
            }
        }
        echo "as";
    }
    // public function upload(Request $request)
    // {
    //     if ($request->hasFile('upload')) {
    //         Artisan::call('storage:link');
    //         //get filename with extension
    //         $filenamewithextension = $request->file('upload')->getClientOriginalName();

    //         //get filename without extension
    //         $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

    //         //get file extension
    //         $extension = $request->file('upload')->getClientOriginalExtension();

    //         //filename to store
    //         $filenametostore = md5($filename) . '_' . time() . '.' . $extension;

    //         //Upload File
    //         $request->file('upload')->storeAs('public/uploads', $filenametostore);

    //         $CKEditorFuncNum = $request->input('CKEditorFuncNum');
    //         $url = asset('storage/uploads/' . $filenametostore);
    //         $msg = 'Image successfully uploaded';
    //         $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

    //         // Render HTML output
    //         @header('Content-type: text/html; charset=utf-8');
    //         echo $re;
    //     }
    // }
}
