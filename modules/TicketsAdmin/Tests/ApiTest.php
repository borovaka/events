<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApiTest extends TestCase
{


    /**
     * Upload event data from json api
     *
     * @return void
     */
    public function test_json_api_upload()
    {

        $requestJson = <<<JSON
    {
	"user" : "admin@tickets.dev",
	"data" : [
		{
	        "event_name" : "Test Event1",
			"event_desc" : "Test Event1 Description",
			"start_date" : "2016-02-15 20:00:00",
			"price" : "20",
			"discount" : "2",
			"quantity" : "100",
			"promocode" : "test1promo"
		},
		{
		    "event_name" : "Test Event2",
			"event_desc" : "Test Event2 Description",
			"start_date" : "2016-02-15 20:00:00",
			"price" : "20",
			"discount" : "2",
			"quantity" : "200",
			"promocode" : "test2promo"
		}
	]

}
JSON;


        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => url('/admin/api/events/create'),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $requestJson,
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/json",
                "x-authorization: c786e9e743c8ff591e5cd5de9455ebcf92ccbc55"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $this->assertJsonStringEqualsJsonString($response, '{"status":"success"}');
    }


    /**
     * Check for Event record for api insert
     * @return void
     */
    public function test_database_events_check()
    {
        $this->seeInDatabase('events', ['event_name' => 'Test Event1']);
    }


}
