<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\LoginUserController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\FrontendPostController;
use App\Http\Controllers\backend\RolePermissionController;
use App\Http\Controllers\backend\SettingController;
use App\Http\Controllers\backend\TagController;
use App\Http\Controllers\frontend\GithubController;
use App\Http\Controllers\frontend\GoogleController;

    Auth::routes();

// =======frontend route=======

    Route::controller(FrontendController::class)->name('frontend.')->group(function(){
    //frontend controller
    Route::get('/',  'index')->name('index');
    Route::get('/slider-view', 'slider')->name('slider');
    Route::get('/search',  'search')->name('search');
    Route::get('/author-post/{id}',  'author')->name('author.post');
    Route::get('/author-list',  'author_list')->name('author.list');
    Route::get('/about-us',  'about')->name('about');
    Route::get('/contact',  'contact')->name('contact');
    //post controller
    Route::controller(FrontendPostController::class)->group(function(){
        Route::get('/category/{slug}', 'archive')->name('category.archive');
        Route::get('/post/{slug}', 'singlePost')->name('post.singlePost');
    });
    //comment route
    Route::controller(CommentController::class)->group(function(){
        Route::post('/comments', 'store')->name('comment.store');
    });
    //github route
    Route::controller(GithubController::class)->name('github.')->group(function(){
        Route::get('/github/redirect', 'redirect_provider')->name('redirect');
        Route::get('/github/callback',  'provider_to_application')->name('callback');
    });
    //github route
    Route::controller(GoogleController::class)->name('google.')->group(function(){
        Route::get('/google/redirect', 'redirect_provider')->name('redirect');
        Route::get('/google/callback',  'provider_to_application')->name('callback');
    });

});


//======backend route======
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
            Route::get('/restore/{id}', 'restore')->name('restore');
            Route::delete('/permanent-delete/{id}', 'permanentDelete')->name('permanent.delete');
            Route::get('/show/{post}', 'show')->name('show');
        });
        //tag routes
        Route::controller(TagController::class)->prefix('tag')->name('tag.')->group(function(){
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::delete('/delete/{tag}', 'destroy')->name('destroy');
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
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::put('/update/{id}', 'update')->name('update');
            Route::get('/show/{id}', 'show')->name('show');
            Route::get('/trash', 'trash')->name('trash');
            Route::get('/restore/{id}', 'restore')->name('restore');
            Route::delete('/permanent-delete/{id}', 'permanentDelete')->name('permanent.delete');
            Route::delete('/delete/{id}', 'destroy')->name('destroy');
        });
            //login user
        Route::controller(LoginUserController::class)->prefix('login')->name('login.')->group(function(){
            Route::get('/user-edit', 'edit')->name('user.edit');
            Route::put('/user-update', 'update')->name('user.update');
            Route::get('/user-show', 'show')->name('user.show');
        });

        //login user
        Route::controller(SettingController::class)->prefix('setting')->name('setting.')->group(function(){
            Route::get('/edit', 'edit')->name('edit');
            Route::put('/update', 'update')->name('update');
        });




    });
