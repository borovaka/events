<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'type' => 1
    ];
});

$factory->define(App\Event::class, function (Faker\Generator $faker) {
    return [
        'user_id' => factory(App\User::class)->create()->id,
        'event_name' => $faker->name,
        'event_desc' => $faker->sentence(),
        'start_date' => $faker->dateTime,
        'quantity' => $faker->numberBetween(1,1000),
        'price' => $faker->randomFloat(2,1,100),
        'discount' => $faker->randomFloat(2,1,10),
        'promocode' => $faker->name,

    ];
});
