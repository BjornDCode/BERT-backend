<?php

Route::group(['middleware' => ['api']], function() {

    Route::post('/auth/signup', [
        'uses' => 'AuthController@signup'
    ]);

    Route::post('auth/signin', [
        'uses' => 'AuthController@signin'
    ]);



    Route::group(['middleware' => 'jwt.auth'], function() {

        Route::get('/user', [
            'uses' => 'UserController@index'
        ]);

        Route::post('/project', [
            'uses' => 'ProjectController@store'
        ]);

        Route::get('/project', [
            'uses' => 'ProjectController@index'
        ]);

        Route::get('/project/{project}', [
            'uses' => 'ProjectController@show'
        ]);

    });

});
