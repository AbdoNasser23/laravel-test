<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    Route::get("/", IndexController::class)->name("index");


    Route::get("/contact", ContactController::class)->name("contact");

    // posts

    //comments
    Route::resource('comments', CommentController::class);

    //Tags

    Route::resource('tags', TagController::class);

    //Auth

    Route::get('/signup',[AuthController::class , 'showSignupForm'])->name('signup');
    Route::get('/login',[AuthController::class , 'showLoginForm'])->name('login');
    Route::post('/signup',[AuthController::class,'signup'])->name('auth.signup');
    Route::post('/login',[AuthController::class,'login'])->name('auth.login');
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');

    Route::middleware('auth')->group(function(){
    Route::resource('posts', PostController::class);

    });

    Route::middleware('onlyMe')->group(function(){
    Route::get("/about", AboutController::class)->name("about");

    });

});
