<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Azienda;
use App\Voucher;

class GetVoucherListTest extends TestCase
{

    use DatabaseMigrations;

     /**
     * @group api-get-vouchers-list
     *
     * @return void
     */
    public function testGetVouchersList()
    {
        $company1 = factory(Azienda::class)->create();

        $voucher1 = factory(Voucher::class)->create(['azienda_id' => $company1->id]);
        $voucher2 = factory(Voucher::class)->create(['azienda_id' => $company1->id]);


        $company2 = factory(Azienda::class)->create();

        $voucher1 = factory(Voucher::class)->create(['azienda_id' => $company2->id]);
        $voucher2 = factory(Voucher::class)->create(['azienda_id' => $company2->id]);


        $response = $this->get('/api/vouchers/');


        $response 
            ->assertStatus(200)
            // ->assertJsonFragment([
            //     'id' => $company->id,
            //     'ragioneSociale' => $company1->ragioneSociale,
            // ])  
            // ->assertJsonStructure([
            //     'id' ,
            //     'ragioneSociale' ,
            //     'vouchers',
            // ])
            ;

    }
}
