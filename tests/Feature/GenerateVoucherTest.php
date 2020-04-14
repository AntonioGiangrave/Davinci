<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Company;
use App\Voucher;

class GenerateVoucherTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @group api-get-vouchers
     *
     * @return void
     */
    public function testGenerateVoucher()
    {
        $company = factory(Company::class)->create();

        $faker = \Faker\Factory::create();

        $gratuito = $faker->boolean ? 1 : 0;

        $sconto = $gratuito ? 0 : $faker->randomDigit;

        $voucher = factory(Voucher::class, 2)->create([
            'company_id' => $company->id, 
            'gratuito' => $gratuito,
            'sconto' => $sconto
            ]);

        $prefix = substr($company->ragioneSociale, 0, 2);
        $this->assertRegExp('/('.$prefix.'+[A-Za-z0-9]{4})/i',$voucher[0]->voucher);
        $this->assertRegExp('/('.$prefix.'+[A-Za-z0-9]{4})/i',$voucher[1]->voucher);




    }
}
