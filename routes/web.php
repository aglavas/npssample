<?php

Route::view('/login', 'auth.login')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('post.login');

Route::get('answer', 'AnswerController@index')->name('get.answer');
Route::post('answer', 'AnswerController@store')->name('post.answer');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('logout', 'Auth\LoginController@logout')->name('logout');

    //Survey
    Route::get('survey/{survey}', 'SurveyController@index')->name('survey');
    Route::get('survey/{survey}/statistics', 'SurveyController@getStatistics')->name('survey.statistics');
});

