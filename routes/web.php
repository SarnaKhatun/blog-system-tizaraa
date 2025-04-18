<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\Admin\AdminPostController;


Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'not_admin'])->group(function () {
    Route::resource('posts', PostController::class);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->middleware(['auth', 'verified'])->name('admin.dashboard');

    Route::resource('posts', AdminPostController::class)->names('admin.posts');
    Route::get('publish-post/{id}', [AdminPostController::class, 'toggle'])->name('admin.posts.publish');

});

Route::get('/', [PostsController::class, 'index'])->name('blog-index');
Route::get('/blog-details/{id}', [PostsController::class, 'show'])->name('blog-show');

require __DIR__.'/auth.php';
