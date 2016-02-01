<?php namespace Modules\Ticketsadmin\Http\Controllers;


use App\Event;
use App\Ticket;
use App\User;
use Illuminate\Http\Request;

class TicketsAdminController extends AdminBaseController
{

    public function index()
    {
        return view('ticketsadmin::index');
    }


    public function events()
    {
        $events = Event::with('user')->paginate(15);
        return view('ticketsadmin::events', compact('events'));

    }


}