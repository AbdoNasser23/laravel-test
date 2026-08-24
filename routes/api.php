<?php

// use App\Http\Controllers\CommentController;
// use App\Http\Controllers\PostController;
// use App\Http\Controllers\TagController;

use App\Http\Controllers\Api\V1\Authcontroller;
use App\Http\Controllers\Api\V1\PostApiController as V1PostApiController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function(){
    Route::apiResource("post",V1PostApiController::class);

    Route::prefix('auth')->group(function(){
        Route::post('login', [Authcontroller::class, 'login'])->name('api.login');

        Route::middleware('auth:api')->group(function(){
            Route::Get('me', [Authcontroller::class, 'me'])->name('api.me');
            Route::post('logout', [Authcontroller::class, 'logout'])->name('api.logout');
            Route::post('refresh', [Authcontroller::class, 'refresh'])->name('api.refresh');
        });
    });
});

