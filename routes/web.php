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

Route::get('/', 'HomeController@getNew')->name('home');
Route::get('/home', 'HomeController@getNew')->name('new');
Route::get('/new', 'HomeController@getNew')->name('new');

Route::middleware(['auth', 'verified'])->group(function() {
	Route::get('/submit', 'SubmitController@getSubmitPage')->name('submit.page');
	Route::post('/submit', 'SubmitController@postSubmit')->name('submit');
});

Route::get('/file/{filename}', function($filename) {
	$path = storage_path() . '/' . $filename;
	echo $path;
});