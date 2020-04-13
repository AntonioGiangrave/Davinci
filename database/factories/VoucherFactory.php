<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Voucher;
use Faker\Generator as Faker;

$factory->define(Voucher::class, function (Faker $faker, $params) {
    return [
        'voucher' => 'dffdf',
        'gratuito' => 1,
        'sconto' => 0,
    ];
});
