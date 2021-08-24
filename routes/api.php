<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
use \App\Http\Controllers\Api;

Route::group([],function () {

    Route::post('login',[Api\UserController::class,'login']);
    Route::post('signup',[Api\UserController::class,'create']);
    Route::post('password/forgot-password', [Api\UserController::class,'forgotPassword']);
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('/profile/{user?}',[Api\UserController::class,'show']);
        Route::post('/timeline',[Api\PostController::class,'index']);
        Route::get('/post/{posts}',[Api\PostController::class,'show']);
        Route::get('/friends',[Api\UserController::class,'see']);
        Route::post('/friend',[Api\UserController::class,'addfriends']);
        Route::post('/newpost',[Api\PostController::class,'store']);
        Route::put('/users/{user}',[Api\UserController::class,'update']);
        Route::post('/logout',[Api\UserController::class,'logout']);
        Route::get('/favorites',[Api\UserController::class,'display']);
        Route::post('/favorite',[Api\PostController::class,'addfavorites']);
        Route::post('/home',[Api\UserController::class,'home']);

    });
});
