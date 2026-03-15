<?php

// use App\Http\Controllers\CommentController;
// use App\Http\Controllers\PostController;
// use App\Http\Controllers\TagController;

use App\Http\Controllers\Api\V1\PostApiController as V1PostApiController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function(){
    Route::apiResource("post",V1PostApiController::class);
});

