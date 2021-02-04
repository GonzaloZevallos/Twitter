<?php

use App\Http\Controllers\Api\TweetApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;

Route::get('/', [PagesController::class, 'showWelcome'])->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->get('/feed', [PagesController::class, 'showFeed'])->name('feed');

