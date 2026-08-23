<?php
use Illuminate\Support\Facades\Route;
use App\Features\Post\Http\Controllers\PostController;

Route::prefix('posts')->name('posts.')->group(function () {
    Route::apiResource('/', PostController::class);
    Route::get('/search', [PostController::class, 'search'])
        ->name('search');
});
