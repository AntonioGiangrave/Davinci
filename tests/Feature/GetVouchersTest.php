<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Azienda;
use App\Voucher;
use Faker\Generator as Faker;


class GetVouchersTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * @group api-get-vouchers
     *
     * @return void
     */
    public function testGetVouchers()
    {
        $company = factory(Azienda::class)->create();

        $faker = \Faker\Factory::create();

        $gratuito = $faker->boolean ? 1 : 0;

        $sconto = $gratuito ? 0 : $faker->randomDigit;

        factory(Voucher::class)->create([
            'azienda_id' => $company->id, 
            'gratuito' => $gratuito,
            'sconto' => $sconto
            ]);

        $response = $this->get('/api/vouchers/'.$company->id);


        $response 
            ->assertStatus(200)
            ->assertJsonFragment([
                'id' => $company->id,
                'ragioneSociale' => $company->ragioneSociale,
            ])  
            ->assertJsonStructure([
                'id' ,
                'ragioneSociale' ,
                'vouchers',
            ])
            ;

    }
}