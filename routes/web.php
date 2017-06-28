<?php

Route::group(['middleware' => ['cors', 'api']], function() {

    Route::post('/auth/signup', [
        'uses' => 'AuthController@signup'
    ]);

    Route::post('/auth/signin', [
        'uses' => 'AuthController@signin'
    ]);


    Route::post('/response', [
        'uses' => 'ResponseController@store'
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


        Route::post('/comparison', [
            'uses' => 'ComparisonController@store'
        ]);

        Route::get('/comparison', [
            'uses' => 'ComparisonController@index'
        ]);

        Route::get('/comparison/{comparison}', [
            'uses' => 'ComparisonController@show'
        ]);


        Route::get('/response', [
            'uses' => 'ResponseController@index'
        ]);

        Route::get('/response/{response}', [
            'uses' => 'ResponseController@show'
        ]);

    });

});
