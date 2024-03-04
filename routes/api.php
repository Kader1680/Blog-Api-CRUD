<?php

use App\Http\Controllers\apiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/blog', [apiController::class, 'show']);
Route::put('/blog/{id}', [apiController::class, 'edit']);
Route::get('/blog/{id}', [apiController::class, 'index']);
Route::post('/blog/{id}', [apiController::class, 'index']);
Route::post("create", [apiController::class, 'create']);

// Route::get('/blog/edit/{post}', [BlogPostController::class, 'ediBlog'])->name("edit");
// Route::put('/blog/update/{post}', [BlogPostController::class, 'updateBlog'])->name("update");
// Route::delete('/blog/delete/{post}', [BlogPostController::class, 'deleteBlog'])->name("delete");
// Route::delete('/blog', [BlogPostController::class, 'deleteAll'])->name("deleteAll");
