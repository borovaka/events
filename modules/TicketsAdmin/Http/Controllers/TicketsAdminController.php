<?php namespace Modules\Ticketsadmin\Http\Controllers;


class TicketsAdminController extends AdminBaseController {

	public function index()
	{
		return view('ticketsadmin::index');
	}
	
}