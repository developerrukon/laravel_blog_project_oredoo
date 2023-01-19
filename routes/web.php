<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\frontend\FrontendController;
use League\CommonMark\Extension\SmartPunct\DashParser;
use App\Http\Controllers\frontend\FrontendPostController;
use App\Http\Controllers\backend\RolePermissionController;

    Auth::routes();

// frontend route

    Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
    Route::controller(FrontendPostController::class)->group(function(){
        Route::get('/category/{slug}', 'archive')->name('frontend.category.archive');
        Route::get('/post/{slug}', 'singlePost')->name('frontend.post.singlePost');
    });
//comment route
    Route::controller(CommentController::class)->group(function(){
        Route::post('/comments', 'store')->name('comment.store');
    });

//backend route
    Route::middleware('auth')->prefix('admin')->name('backend.')->group(function(){
        Route::get('/', [DashboardController::class, 'index'])->name('index');
        //categories routes
        Route::controller(CategoryController::class)->prefix('category')->name('category.')->group(function(){
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{category}', 'edit')->name('edit');
            Route::put('/update/{category}', 'update')->name('update');
            Route::delete('/delete/{category}', 'destroy')->name('destroy');
            Route::get('/restore/{id}', 'restore')->name('restore');
            Route::delete('/permanent-delete/{id}', 'permanentDelete')->name('permanent.delete');
            Route::get('/show/{category}', 'show')->name('show');

        });
        //post routes
        Route::controller(PostController::class)->prefix('post')->name('post.')->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{post}', 'edit')->name('edit');
            Route::put('/update/{post}', 'update')->name('update');
            Route::delete('/delete/{post}', 'destroy')->name('destroy');
            Route::get('/restore/{post}', 'restore')->name('restore');
            Route::delete('/permanent-delete/{post}', 'permanentDelete')->name('permanent.delete');
            Route::get('/show/{post}', 'show')->name('show');
        });
        // role route permission
        Route::controller(RolePermissionController::class)->prefix('roles')->name('role.')->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/update/{id}', 'update')->name('update');
            Route::delete('/delete/{id}', 'destroy')->name('destroy');
            //optional route
            Route::post('/create/permission', 'storePermission')->name('permission.store');
        });
        //backend user route
        Route::controller(UserController::class)->prefix('users')->name('users.')->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
        });

    });
