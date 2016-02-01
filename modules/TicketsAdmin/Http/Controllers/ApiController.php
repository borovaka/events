<?php namespace Modules\Ticketsadmin\Http\Controllers;

use App\Event;
use App\User;
use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
use Illuminate\Http\Request;
use Tickets\EventsParser\Exceptions\JsonParserException;
use Tickets\EventsParser\JsonParser;
use Tickets\EventsParser\ParseEventData;


class ApiController extends ApiGuardController
{


    protected $apiMethods = [
        'create'
    ];

    public function create(Request $request)
    {


        $rules = [
            'user' => 'required|email',
            'data' => 'required',
            'data.*.event_name' => 'required|string',
            'data.*.event_desc' => 'required|string',
            'data.*.start_date' => 'required|date',
            'data.*.quantity' => 'required|numeric',
            'data.*.price' => 'required|numeric',
            'data.*.discount' => 'numeric',
        ];

        try {
            $jsonParser = new JsonParser();
            $parser = new ParseEventData($jsonParser, $request, $rules);
            $eventsData = $parser->getResult();
        } catch (JsonParserException $e) {
            return $e->handle();
        }


        $user = User::where('email', $eventsData['user'])->first();

        foreach ($eventsData['data'] as $event) {
            $user->events()->create($event);
        }

        return response()->json(['status' => 'success']);


    }
}