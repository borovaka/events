<?php

Route::group(['middleware' => 'web','prefix' => 'admin', 'namespace' => 'Modules\TicketsAdmin\Http\Controllers'], function () {
    Route::get('/', 'UsersController@index');
    Route::resource('users', 'UsersController');
    Route::get('/apikey/{userId}','UsersController@generateApiKey')->name('admin.users.apikey');
    Route::resource('events', 'EventsController');
    Route::get('/test','TicketsAdminController@getApiKey');

});
Route::get('/admin/api/events/create','Modules\TicketsAdmin\Http\Controllers\ApiController@create');
Route::post('/admin/api/events/create','Modules\TicketsAdmin\Http\Controllers\ApiController@create');
