<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', 'PostController@index')->name('index');
Route::post('/post/like_dislike', 'PostController@likeDislike' )->name('post.like_dislike');
Route::post('/post/update_comment', 'PostController@updateComment' )->name('post.update_comment');

Route::post('/comment/add_comment', 'CommentController@addComment')->name('comment.add');


Route::group([
    'prefix' => '/admin',
    'namespace' => 'Admin',
    'middleware' => ['auth','admin']],
    function() {
        Route::get('/', 'PostController@index')->name('posts');
        Route::get('post', 'PostController@create')->name('post.create');
        Route::post('post', 'PostController@store')->name('post.store');
        Route::get('/edit/{id}', 'PostController@edit')->name('post.edit');
        Route::post('/edit/{id}', 'PostController@update')->name('post.update');
        Route::delete('/{id}', 'PostController@destroy')->name('post.destroy');
        
        
        Route::get('comments', 'CommentController@index')->name('comments');
        Route::delete('/comments/{comment}', 'CommentController@destroy')->name('comment.destroy');
    });


    Route::group([
        'prefix' => '/user',
        'namespace' => 'User',
        'middleware' => ['auth','user']],
        function() {

            Route::get('/', 'PostController@index')->name('user_posts');
            Route::get('post', 'PostController@create')->name('user_post.create');
            Route::post('post', 'PostController@store')->name('user_post.store');
            Route::get('/edit/{id}', 'PostController@edit')->name('user_post.edit');
            Route::post('/edit/{id}', 'PostController@update')->name('user_post.update');
            Route::delete('/delete/{id}', 'PostController@destroy')->name('user_post.destroy');

            
            
        });
        
Route::get('post/updateNotification/{id}', 'PostController@update_notification')->name('update_notification');
Route::get('post/listNotifications', 'PostController@list_notifications')->name('post.notification');
Route::get('/{id}', 'PostController@showPost')->name('front.show');