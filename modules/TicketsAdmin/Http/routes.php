<?php

Route::group(['middleware' => 'web', 'prefix' => 'admin', 'namespace' => 'Modules\TicketsAdmin\Http\Controllers'], function()
{
	Route::get('/', 'TicketsAdminController@index');
});