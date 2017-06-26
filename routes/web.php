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


        Route::post('/page', [
            'uses' => 'PageController@store'
        ]);

        Route::get('/page', [
            'uses' => 'PageController@index'
        ]);

        Route::get('/page/{page}', [
            'uses' => 'PageController@show'
        ]);


        Route::post('/test', [
            'uses' => 'TestController@store'
        ]);

        Route::get('/test', [
            'uses' => 'TestController@index'
        ]);

        Route::get('/test/{test}', [
            'uses' => 'TestController@show'
        ]);

    });

});
