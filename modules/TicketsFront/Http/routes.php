<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\TicketsFront\Http\Controllers'], function()
{
	Route::get('/', 'TicketsFrontController@index');
	Route::get('/getEvents','TicketsFrontController@getEvents');
	Route::get('/getEvent','TicketsFrontController@getEvent');
	Route::get('/applyPromo','TicketsFrontController@applyPromo');
	Route::post('/buyTicket','TicketsFrontController@buyTicket');
	Route::get('/getTickets','TicketsFrontController@getTickets');
});