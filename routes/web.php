<?php

use Illuminate\Support\Facades\Route;
use App\Post;
use Illuminate\Http\Request;

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

Auth::routes();
Route::get('/', 'ArticleController@index')->name('index');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('article', 'ArticleController');

Route::any('/search',function(Request $request){
    $q = $request->q;
    $post = Post::where('title','LIKE','%'.$q.'%')->orWhere('body','LIKE','%'.$q.'%')->get();
    if(count($post) > 0)
        return view('landing', ['posts' => $post, 'q' => $q]);
    else return view ('landing')->withMessage('No Details found. Try to search again !');
});

Route::middleware(['auth', 'verifyadmin'])->group(function () {
    Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
    Route::resource('admin/post', 'PostController');
    Route::resource('admin/comments', 'CommentsController');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
