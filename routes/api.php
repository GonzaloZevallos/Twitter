<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use \App\Http\Controllers\Api\AuthController;

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

//Route::group([
//    'namespace' => 'Auth\V1\Auth'
//], function () {
//
//});


//Route::post('login', [AuthController::class, 'login']);
//Route::post('register', [AuthController::class, 'register']);

Route::group([
    'prefix' => 'v1',
//    'middleware' => ['auth:sanctum'],
    'namespace' => 'Api\V1'
], function () {

    // Auth

    // Tweets
    Route::group([
        'prefix' => 'tweets',
        'namespace' => 'Tweets'
    ],function () {
        Route::get('/feed', 'TweetApiController@getFeed')->name('getFeed');
        Route::get('/last', 'TweetApiController@getLast')->name('getLast');
        Route::post('/', 'TweetApiController@store')->name('postATweet');
    });
});


