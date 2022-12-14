<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\MailController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\LanguageController;


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
Route::get('/language/{locale}', [LanguageController::class, 'language']);

Route::get('/', function (Request $request) {
    $message = 'Loading welcome page';
    Log::info($message);
    $request->session()->flash('info', $message);
    return view('welcome');
});

Auth::routes();
require __DIR__.'/email-verify.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('mail/test', [MailController::class, 'test']);

Route::resource('files', FileController::class)
->middleware(['auth', 'permission:files']);

Route::resource('posts', PostController::class);

Route::resource('places', PlaceController::class);

Route::post('posts{post}/likes',[PostController::class,'like'])->name('posts.like');

Route::post('posts{post}/unlikes',[PostController::class,'unlike'])->name('posts.unlike');

Route::post('places{place}/favorites',[PlaceController::class,'favorite'])->name('places.favorite');

Route::post('places{place}/unfavorites',[PlaceController::class,'unfavorite'])->name('places.unfavorite');