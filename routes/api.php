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
Route::prefix('tweets')->group(function () {
    Route::get('/feed', [TweetApiController::class, 'getFeed']);
    Route::get('/last', [TweetApiController::class, 'getLast']);
    Route::post('/', [TweetApiController::class, 'store']);
});


