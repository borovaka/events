<?php namespace Modules\Ticketsfront\Http\Controllers;

use App\Event;
use App\Ticket;
use Illuminate\Http\Request;
use Pingpong\Modules\Routing\Controller;

class TicketsFrontController extends Controller
{

    public function index()
    {
        return view('ticketsfront::index');
    }

    public function getEvents(Request $request)
    {
        if (\Request::ajax()) {
            if (!empty($request->get('search'))) {
                $events = Event::search($request->get('search'))->with('user')->paginate(15);
            } else {
                $events = Event::with('user')->paginate(15);
            }
            return \Response::json($events);
        }
        return \Response::json(['status' => 'error'], 400);

    }

    public function getEvent()
    {
        if (\Request::ajax()) {
            $event = Event::findOrFail(\Request::get('event_id'));
            return \Response::json($event);
        }
        return \Response::json(['status' => 'error'], 400);

    }

    public function applyPromo()
    {
        $event = Event::findOrFail(\Request::get('event_id'));
        if ($event->promocode === \Request::get('promocode')) {
            return \Response::json(['status' => 'success', 'discount' => $event->discount]);
        }
        return \Response::json(['status' => 'error'], 400);
    }

    public function buyTicket()
    {
        if(\Request::ajax()){
            $event_id = (int)\Request::get('event_id');
            $event = Event::findOrFail($event_id);
            $ticket = [];
            $ticket['price'] = round($event->price * \Request::get('quantity'), 2);
            $ticket['raw_price'] = round($event->price * \Request::get('quantity'), 2);
            $ticket['quantity'] = \Request::get('quantity');

            if (\Request::get('promocode') === $event->promocode) {
                $ticket['price'] = round($ticket['price'] - $event->discount, 2);
            }

            $user = \Request::user();
            $ticket = $user->tickets()->create($ticket);
            $ticket->event()->associate($event)->save();
            return \Response::json(['status' => 'success']);

        }
        return \Response::json(['status' => 'error'], 400);

    }

    public function getTickets()
    {
        if(\Request::ajax()) {

            $tickets = \Request::user()->tickets()->with('event')->orderBy('created_at', 'desc')->paginate(15);
            return \Response::json($tickets);
        }
        return \Response::json(['status' => 'error'], 400);
    }

}