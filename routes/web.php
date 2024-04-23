<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return redirect(route('posts'));
})->name('home');

Route::middleware('auth')->group(function () {
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/new', [PostController::class, 'create'])->name('posts.new');

    Route::put('/posts/{post}', [PostController::class, 'update'])
        ->can('update', 'post')->name('posts.update');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
        ->can('update', 'post')->name('posts.edit');
});

/* General routes */
Route::controller(PostController::class)->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
});



/* Auth routes */
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
