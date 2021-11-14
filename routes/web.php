<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
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

Route::get('/', [SiteController::class, 'index'])
    ->name('index');

Route::group(['middleware'=> 'auth'], function() {
    // All routes that needs authentication goes here...

    Route::get('/dashboard', [SiteController::class, 'dashboard'])
        ->name('dashboard');

    Route::get('/author/posts', [PostController::class, 'authorPosts'])
        ->name('authorPosts');

    Route::get('/author/view-post/{id}', [PostController::class, 'viewAuthorPost'])
        ->name('authorPost');

    Route::get('/author/create', [PostController::class, 'create'])
        ->name('create');

    Route::get('/author/update-post/{id}', [PostController::class, 'updateAuthorPost'])
        ->name('updateAuthorPost');

    Route::post('/store', [PostController::class, 'store'])
        ->name('storePost');

    Route::post('/modify/{id}', [PostController::class, 'modify'])
        ->name('modifyPost');

    Route::post('/destroy/{id}', [PostController::class, 'destroy'])
        ->name('destroyPost');
});

require __DIR__.'/auth.php';
