<?php

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

Route::get('/',function (){
    return redirect('login');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
//
//Route::post('/timeline',[\App\Http\Controllers\PostController::class, 'CreatePost'])->name('createpost');
//
//
//Route::get('/post/{post}', [\App\Http\Controllers\HomeController::class, 'show']);
//Route::get('/like', [\App\Http\Controllers\PostController::class, 'like'])->name('like');
//Route::get('/dislike', [\App\Http\Controllers\PostController::class, 'dislike'])->name('dislike');
//Route::post('/comment',[\App\Http\Controllers\CommentController::class, 'CreateComment'])->name('createcomment');
//Route::get('users/{user}',[\App\Http\Controllers\UserController::class, 'edit'] );
//Route::patch('users/{user}/update',[\App\Http\Controllers\UserController::class, 'update'] );

Route::group(['middleware'=>'auth'],function (){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::post('/timeline',[\App\Http\Controllers\PostController::class, 'CreatePost'])->name('createpost');
    Route::get('/profile/{user_id?}', [\App\Http\Controllers\HomeController::class, 'profile']);
    Route::get('/post/{post}', [\App\Http\Controllers\HomeController::class, 'show']);
    Route::post('/comment',[\App\Http\Controllers\CommentController::class, 'CreateComment'])->name('createcomment');
    Route::get('users/{user}',[\App\Http\Controllers\UserController::class, 'edit'] );
    Route::patch('users/{user}/update',[\App\Http\Controllers\UserController::class, 'update'] );
});
