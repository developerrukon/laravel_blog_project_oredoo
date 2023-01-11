<?php

use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\RolePermissionController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\FrontendPostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use League\CommonMark\Extension\SmartPunct\DashParser;
use Spatie\Permission\Contracts\Role;

    Auth::routes();
// frontend route
    Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
    Route::get('/Category/{slug}', [FrontendPostController::class, 'archive'])->name('frontend.category.archive');
    Route::get('/Post/{slug}', [FrontendPostController::class, 'singlePost'])->name('frontend.post.singlePost');
    Route::controller(CommentController::class)->group(function(){
        Route::post('/comments', 'store')->name('comment.store');
    });

//backend route
    Route::middleware('auth')->prefix('admin')->name('backend.')->group(function(){
        Route::get('', [DashboardController::class, 'index'])->name('index');
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
            Route::get('/restore/{id}', 'restore')->name('restore');
            Route::delete('/permanent-delete/{id}', 'permanentDelete')->name('permanent.delete');
            Route::get('/show/{post}', 'show')->name('show');
        });
        // role route permission
        Route::controller(RolePermissionController::class)->group(function(){
            Route::get('/role', ['index'])->name('role.index');
            Route::get('/create/role', ['create'])->name('role.create');
            Route::post('/store/role', ['store'])->name('role.store');
            //optional route
            Route::post('/create/permission', ['storePermission'])->name('permission.store');
        });
        //backend user route
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
    });
