<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;
use Faker\Generator as Faker;
use App\Company;
use App\Voucher;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Cache::forget('companies.all');

        Cache::forget('vouchers.all');

        factory(Company::class, 3)
            ->create()
            ->each(function ($company) {
                $faker = \Faker\Factory::create();

                $gratuito = $faker->boolean ? 1 : 0;

                $sconto = $gratuito ? null : $faker->randomDigit + 3;

                $company->vouchers()->saveMany(
                    factory(Voucher::class, 5)->create([
                        'company_id' => $company->id,
                        'gratuito' => $gratuito,
                        'sconto' => $sconto,
                    ])
                );
            });
    }
}
