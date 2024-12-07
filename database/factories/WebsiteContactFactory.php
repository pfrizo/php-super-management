<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\WebsiteContact;
use Faker\Generator as Faker;

$factory->define(WebsiteContact::class, function (Faker $faker) {
    return [
            'name' => $faker->name,
            'phone' => $faker->tollFreePhoneNumber,
            'email' => $faker->unique()->email,
            'contact_type' => $faker->numberBetween(1, 3),
            'message' => $faker->text(200)
    ];
});
