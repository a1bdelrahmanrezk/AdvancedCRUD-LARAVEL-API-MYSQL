<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Modules\Mail\app\Emails\CreateNewUserMail;
use Modules\Mail\app\Events\CreateUserEvent;

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

// Route::get('/send',function(){
//     event(new CreateUserEvent('Lolo_Rizk','lolo9999rizk@gmail.com'));
//     return response('Success');
// });
// Steps 
// 1- setup configuration
// 2- create mail and write inside build function your View Message and parameter U want
// 3- create event & listener 
// 4- inside listener [in handle method] write handle(eventName $event) and write inside it what U want to do
// 5- call the event where U want [event(new CreateUserEvent('Lolo_Rizk','lolo9999rizk@gmail.com'));]