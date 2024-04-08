<?php

use App\Http\Controllers\apiController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/blog', [apiController::class, 'show']);

Route::put('/edit/{p}', [apiController::class, 'edit']);

Route::get('/blog/{id}', [apiController::class, 'index']);

Route::delete('/delete/{id}', [apiController::class, 'delete']);

Route::post("create", [apiController::class, 'create']);

Route::get('/clients', [apiController::class, 'showClient']);

Route::post('/postClients', [apiController::class, 'addClient']);
