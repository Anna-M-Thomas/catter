<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\MeowController;



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

Route::get('/', 'App\Http\Controllers\TimelineController@index')->name('timeline')->middleware(['auth', 'verified']);
Route::post('/meow', 'App\Http\Controllers\MeowController@store')->middleware(['auth', 'verified']);
Route::delete('/meow/{id}', 'App\Http\Controllers\MeowController@delete')->name('meow.delete')->middleware(['auth', 'verified']);

Route::get('/welcome', function () {
    return Inertia::render('Welcome');
});


require __DIR__.'/auth.php';
