<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Azienda;
use Faker\Generator as Faker;

$factory->define(Azienda::class, function (Faker $faker) {
    return [
        'ragioneSociale' => $faker->name
    ];
});
