<?php

Route::get('/', function () {
    // return view('welcome');
    return redirect('/login');
});

Auth::routes();

Route::group(['middleware' => 'auth', 'namespace' => 'user'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});


Route::group(['prefix' => 'admin', 'middleware' => 'adminauth', 'namespace' => 'admin'], function () {
    Route::get('/', 'HomeController@index');

    Route::get('/users', 'UserController@index');

    // Cities
    Route::get('/city', 'CityController@index');
    Route::post('/city', 'CityController@store');
    Route::put('/city', 'CityController@update');
    Route::delete('/city/{id}', 'CityController@destroy');
    
    // Manage Metro Lines
    Route::get('/metro_line_list', 'MetroLineController@index');
    Route::get('/metro_line/create', 'MetroLineController@create');
    Route::post('/metro_line', 'MetroLineController@store');
    Route::put('/metro_line/{id}', 'MetroLineController@update');
    Route::delete('/metro_line/{id}', 'MetroLineController@destroy');

    // Stations
    Route::get('/stations/{city_id}', 'StationController@index');
    Route::post('/station', 'StationController@store');
    Route::put('/station/{id}', 'StationController@update');
    Route::delete('/station/{id}', 'StationController@destroy');
    
    // Media List
    Route::get('/media_list', 'MediaController@index');
    Route::post('/media', 'MediaController@store');
    Route::put('/media/{id}', 'MediaController@update');
    Route::delete('/media/{id}', 'MediaController@destroy');
    
    // Panel Types
    Route::get('/panel_type', 'PanelTypeController@index');
    Route::post('/panel_type', 'PanelTypeController@store');
    Route::put('/panel_type/{id}', 'PanelTypeController@update');
    Route::delete('/panel_type/{id}', 'PanelTypeController@destroy');
    
    // Panel
    Route::get('/panel/{station_id}', 'PanelController@index');
    Route::post('/panel', 'PanelController@store');
    Route::put('/panel/{id}', 'PanelController@update');
    Route::delete('/panel/{id}', 'PanelController@destroy');

});