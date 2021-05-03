<?php

    Route::resource('posts', 'PostsController');

    
    Route::get('posts', [
        'as' => 'posts.index',
        'uses' => 'PostsController@index'
    ]);


?>