<?php namespace Modules\Ticketsadmin\Http\Controllers;

use App\Event;
use Modules\Ticketsadmin\Http\Requests\EventFormRequest;
use Redirect;

class EventsController extends AdminBaseController {
	
	public function index()
	{
		$events = Event::with('user')->paginate(15);
//		dd($events);
		return view('ticketsadmin::events.events', compact('events'));
	}

	public function destroy($id)
	{
		$event = Event::findOrFail($id);
		$event->delete();
		\Flash::success('Event '.$event->event_name.' deleted!');
		return Redirect::back();
	}

	public function update(EventFormRequest $request,$id)
	{
		$event = Event::findOrFail($id);
		$event->update($request->all());
		return Redirect::route('admin.events.index');
	}

	public function edit($id)
	{
		$event = Event::findOrFail($id);
		return view('ticketsadmin::events.update', compact('event'));
	}

	public function store(EventFormRequest $request)
	{
		Event::create($request->all());
		return Redirect::route('admin.events.index');
	}

	public function create()
	{
		return view('ticketsadmin::events.create');
	}
	
}