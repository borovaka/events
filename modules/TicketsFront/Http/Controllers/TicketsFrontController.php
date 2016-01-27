<?php namespace Modules\Ticketsfront\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class TicketsFrontController extends Controller {
	
	public function index()
	{
		return view('ticketsfront::index');
	}
	
}