<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Comment\app\Http\Controllers\CommentController;

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

Route::controller(CommentController::class)->group(function(){
    Route::group(['prefix'=>'comments'],function(){
        Route::get('/','index');
        Route::get('/{id}','show');
        Route::post('/','store');
        Route::patch('/{id}','update');
        Route::delete('/{id}','delete');
    });
});