<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Voucher;
use App\Azienda;
use Faker\Generator as Faker;

$factory->define(Voucher::class, function (Faker $faker, $params) {

    $company = Azienda::find($params['azienda_id']);

    return [
        'voucher' => generateVoucher($company->ragioneSociale, 1)[0],
    ];
});
