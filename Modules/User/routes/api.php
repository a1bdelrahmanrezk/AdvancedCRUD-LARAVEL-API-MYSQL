<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\User\app\Http\Controllers\UserController;

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

Route::controller(UserController::class)->group(function(){
    Route::group(['prefix'=>'users'],function(){
        Route::get('/','index');
        Route::get('/{id}','show');
        Route::post('/','store');
        Route::post('/{id}','update');
        Route::delete('/{id}','delete');
    });
});