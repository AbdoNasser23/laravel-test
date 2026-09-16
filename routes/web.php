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

    Route::get("/about", AboutController::class)->name("about");


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



    // #viewer
    // Route::middleware('role:viewer')->group(function(){

    // });


    #Viewer and Admin

    Route::middleware('role:viewer,admin')->group(function(){
        Route::get('posts/create',[PostController::class,'create'])->name('posts.create');
        Route::post('posts',[PostController::class,'store'])->name('posts.store');
        Route::get('posts', [PostController::class, 'index'])->name('posts.index');
        Route::get('posts/{post}',[PostController::class,'show'])->name('posts.show');
        Route::get('posts/{post}/edit',[PostController::class,'edit'])->name('posts.edit')->can('update', 'post');
        Route::patch('posts/{post}',[PostController::class,'update'])->name('posts.update');
        Route::delete('posts/{post}',[PostController::class,'destroy'])->name('posts.destroy')->can('delete', 'post');
    });



    });



});
