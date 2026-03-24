<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::get("/", IndexController::class)->name("index");

    Route::get("/about", AboutController::class)->name("about");

    Route::get("/contact", ContactController::class)->name("contact");

    // posts
    Route::resource('posts', PostController::class);

    //comments
    Route::resource('comments', CommentController::class);

    //Tags

    Route::resource('tags', TagController::class);
});
