<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['verify' => true]);


Route::middleware(['auth', 'verified'])->group(function() {
	Route::get('/submit', 'SubmitController@getSubmitPage')->name('submit.page');
	Route::post('/submit', 'SubmitController@postSubmit')->name('submit');	
	Route::get('/', 'HomeController@getNew')->name('home');
	Route::get('/home', 'HomeController@getNew')->name('new');
	Route::get('/new', 'HomeController@getNew')->name('new');

	Route::get('/profile/{user_id}', 'ProfileController@getProfile')->name('profile');

	Route::get('/post/{post_id}', 'PostController@getPost')->name('post');
	Route::post('/vote', 'PostController@postVote')->name('vote');
	Route::post('/comment', 'PostController@postCreateComment')->name('comment.create');
	Route::post('/reply', 'PostController@postReplyComment')->name('comment.reply');
	Route::post('/vote-comment', 'PostController@postVoteComment')->name('comment.vote');
});

Route::get('/file/{filename}', function($filename) {
	$path = storage_path() . '/' . $filename;
	echo $path;
});