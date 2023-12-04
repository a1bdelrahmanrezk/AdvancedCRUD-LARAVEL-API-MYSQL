<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Post\app\Http\Controllers\PostController;

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

Route::controller(PostController::class)->group(function(){
    Route::group(['prefix'=>'posts'],function(){
        Route::get('/','index');
        Route::get('/{id}','show');
        Route::post('/','store');
        Route::post('/{id}','update');
        Route::delete('/{id}','delete');
    });
});