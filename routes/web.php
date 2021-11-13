<?php

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
});

require __DIR__.'/auth.php';
