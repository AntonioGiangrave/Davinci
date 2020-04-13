<?php

use Illuminate\Database\Seeder;
use App\Azienda;
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
        factory(Azienda::class, 3)->create()->each(function ($company) {
            $company->vouchers()->saveMany(
                factory(Voucher::class, 5)->make(['azienda_id' => $company->id])
            );
        });
    }
}
