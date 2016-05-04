<?php

Route::get('/', function () {
    return view('welcome');
});

Route::post('/loginorjoin', [
    'as' => 'loginorjoin', 'uses' => 'LoginOrJoinController@index'
]);

Route::post('/complete/submit', [
    'as' => 'completedata', 'uses' => 'UserDataController@submit'
]);

Route::get('/complete', function () {
    return view('complete');
});

Route::get('/dashboard','LoginOrJoinController@loginflag');
