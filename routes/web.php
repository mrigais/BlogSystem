<?php

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

Route::get('/', function () {
    return view('admin.posts');
});

Route::get('/user', 'UsersController@index');
Route::get('/main', function(){
    return view('main');
});

Route::get('/userposts', 'BlogpostController@currentUserPosts');
// Route::get('/blog', 'BlogpostController@index');
Route::get('/displayAllPosts', 'BlogpostController@allPosts')->name('allPosts');

Route::get('/about', function(){
    return view('blogsystem_pages.about_us');
});

Route::get('/create', 'BlogpostController@create')->name('createBlog');

Route::post('/submitForm','BlogpostController@submitForm');
Auth::routes();

Route::get('/home', 'BlogpostController@allPosts')->name('posts');


Route::get('/delete/{id}', 'BlogpostController@deletePost')->name('deletepost');
Route::get('/edit/{id}', 'BlogpostController@edit')->name('editpost');
Route::post('/updateForm', 'BlogpostController@update');