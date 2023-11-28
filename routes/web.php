<?php

use App\Models\Post;
use App\Http\Controllers\BlogPostController;
use App\Models\Blogers;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $ownPost = [
        'title'=>'engineer',
        'body'=>'Engineers, as practitioners of engineering, are professionals who invent, design, analyze, build and test machines, complex systems, structures, gadgets and materials to fulfill functional objectives and'

    ];
    return view('home', [
        'mytitle'=> $ownPost['title'],
        'mybody'=> $ownPost['body']
    ]);
});

Route::get('/about', function () {
    return view('about', [
    'post'=>  Post::all(),
    ]);
});

Route::get('/writres', function (Blogers $bloger) {
    return view('Writres', [
        'blogers' => $bloger::all()
    ]);
});

// Route::get('/blog', function () {
//     return view('allBlog', [
//         'posts'=>  Post::all()
//         // 'posts'=>  Post::deleted()


//         //you can get all the post by the title
//         // 'posts'=>  Post::all('title'),

//     ]);
// });

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


Route::get('/blog', [BlogPostController::class, 'allBlog'])->name("allBlog");
Route::get('/blog/edit/{post}', [BlogPostController::class, 'ediBlog'])->name("edit");
Route::put('/blog/update/{post}', [BlogPostController::class, 'updateBlog'])->name("update");
Route::delete('/blog/delete/{post}', [BlogPostController::class, 'deleteBlog'])->name("delete");

// Route::get('/blog/{id}/edit', function (Post $post) {

//     return view('editBlog');
// });
