<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;

Route::get('/', function () {
    return redirect('/register');
});

Route::get('/register', function () {
    return view('register');
})->middleware(['auth'])->name('register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::controller(PostController::class)->group(function () {
    Route::get('/createPost', 'createPost');
    Route::post('/post/create/{user_id}', 'create');
    Route::get('/posts', 'posts');
});

require __DIR__.'/auth.php';
