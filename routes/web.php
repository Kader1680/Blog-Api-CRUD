<?php

use App\Models\Post;
use App\Http\Controllers\BlogPostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about', [
    'post'=>  Post::all('title'),
    ]);
});
Route::get('/blog', function () {
    return view('allBlog', [
        'posts'=>  Post::all()


        //you can get all the post by the title
        // 'posts'=>  Post::all('title'),

    ]);
});

Route::get('/blog/{post:title}', function (Post $post) {
    return view('blog', [
        'post'=>  ($post),

    ]);
});

Route::get('/create', [BlogPostController::class, 'postblog']);
Route::post("createblog", [BlogPostController::class, 'CreateBlog']);



Route::get('/contact', function () {
    return view('contact');
});
