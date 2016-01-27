<?php namespace Modules\Ticketsadmin\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class AdminBaseController extends Controller {

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.admin');
    }
	
}