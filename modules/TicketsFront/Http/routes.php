<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\TicketsFront\Http\Controllers'], function()
{
	Route::get('/', 'TicketsFrontController@index');
});