<?php

return [
    'name' => 'TicketsAdmin',

    'json_schema' => file_get_contents(__DIR__.'/json_schema.json')
    /*[
        "title" => "Events Schema",
        "type" => "array",
        "items" => [
            "title" => "Event",
            "type" => "object",
            "properties" => [
                "event" => [
                    "type" => "string"
                ],
                "desk" => [
                    "type" => "string"
                ],
                "start_date" => [
                    "type" => "string"
                ],
                "quantity" => [
                    "type" => "integer"
                ],
                "price" => [
                    "type" => "number"
                ],
                "discount_percent" => [
                    "type" => "integer"
                ],
                "promocode" => [
                    "type" => "string"
                ]

            ],
            "required" => ["event", "desk", "start_date", "quantity", "price"]
        ]
    ]*/
];