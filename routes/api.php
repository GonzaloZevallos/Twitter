<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TweetApiController;

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

Route::post('/tweets', [TweetApiController::class, 'store']);
Route::get('/tweets/feed', [TweetApiController::class, 'getFeed']);
Route::get('/tweets/last', [TweetApiController::class, 'getLast']);

//Route::prefix('api')->group(function() {
//    Route::prefix('tweets')->group(function() {
//        Route::post('/', [TweetApiController::class, 'store']);
//    });
//});


