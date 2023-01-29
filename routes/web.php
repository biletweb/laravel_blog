<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'Main'], function () {
    Route::get('/', 'IndexController')->name('main.index');
    Route::get('/category/{category}', 'CategoryController')->name('main.category');
    Route::get('/post/{post}', 'ShowController')->name('main.post');

    Route::group(['namespace' => 'Comment'], function () {
        Route::post('/comment/{post}/store', 'StoreController')->name('main.comment.store');
    });

    Route::group(['namespace' => 'Answer'], function () {
        Route::post('/answer/{post}/store', 'StoreController')->name('main.answer.store');
    });

    Route::group(['namespace' => 'Like'], function () {
        Route::post('/like/{post}/store', 'StoreController')->name('main.like.store');
    });
});

Route::group(['namespace' => 'Personal', 'prefix' => 'personal', 'middleware' => 'auth'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('personal.main.index');
    });

    Route::group(['namespace' => 'Like', 'prefix' => 'liked'], function () {
        Route::get('/', 'IndexController')->name('personal.like.index');
        Route::delete('/{post}', 'DestroyController')->name('personal.like.destroy');
    });

    Route::group(['namespace' => 'Comment', 'prefix' => 'comments'], function () {
        Route::get('/', 'IndexController')->name('personal.comment.index');
        Route::get('/show/{comment}/edit', 'EditController')->name('personal.comment.edit');
        Route::patch('/{comment}', 'UpdateController')->name('personal.comment.update');
        Route::delete('/{comment}', 'DestroyController')->name('personal.comment.destroy');
    });
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('admin.main.index');
    });

    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::post('/store', 'StoreController')->name('admin.category.store');
        Route::get('/show/{category}', 'ShowController')->name('admin.category.show');
        Route::get('/show/{category}/edit', 'EditController')->name('admin.category.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::delete('/{category}', 'DestroyController')->name('admin.category.destroy');
    });

    Route::group(['namespace' => 'Tag', 'prefix' => 'tags'], function () {
        Route::get('/', 'IndexController')->name('admin.tag.index');
        Route::get('/create', 'CreateController')->name('admin.tag.create');
        Route::post('/store', 'StoreController')->name('admin.tag.store');
        Route::get('/show/{tag}', 'ShowController')->name('admin.tag.show');
        Route::get('/show/{tag}/edit', 'EditController')->name('admin.tag.edit');
        Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
        Route::delete('/{tag}', 'DestroyController')->name('admin.tag.destroy');
    });

    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function () {
        Route::get('/', 'IndexController')->name('admin.post.index');
        Route::get('/create', 'CreateController')->name('admin.post.create');
        Route::post('/store', 'StoreController')->name('admin.post.store');
        Route::get('/show/{post}', 'ShowController')->name('admin.post.show');
        Route::get('/show/{post}/edit', 'EditController')->name('admin.post.edit');
        Route::patch('/{post}', 'UpdateController')->name('admin.post.update');
        Route::delete('/{post}', 'DestroyController')->name('admin.post.destroy');
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/create', 'CreateController')->name('admin.user.create');
        Route::post('/store', 'StoreController')->name('admin.user.store');
        Route::get('/show/{user}', 'ShowController')->name('admin.user.show');
        Route::get('/show/{user}/edit', 'EditController')->name('admin.user.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
        Route::delete('/{user}', 'DestroyController')->name('admin.user.destroy');
    });
});

Auth::routes();
