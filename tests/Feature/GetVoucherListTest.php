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
        $companies = factory(Azienda::class, 2)->create();

        $voucher1 = factory(Voucher::class)->create([
            'azienda_id' => $companies[0]->id,  
            'gratuito' => 1,
            'sconto' => 0]);
        
        $voucher2 = factory(Voucher::class)->create([
            'azienda_id' => $companies[0]->id,  
            'gratuito' => 1,
            'sconto' => 0]);
        
        
        $voucher3 = factory(Voucher::class)->create([
            'azienda_id' => $companies[1]->id,  
            'gratuito' => 1,
            'sconto' => 0]);
        

        $response = $this->get('/api/vouchers/');


        $response 
            ->assertStatus(200)
            ->assertJson([
                [   
                    'azienda_id' => $companies[0]->id,
                    'voucher' => $voucher1->voucher,
                    'azienda' => [
                        'id' => $companies[0]->id,
                        'ragioneSociale' => $companies[0]->ragioneSociale,
                    ]
                ],
                [
                    'azienda_id' => $companies[0]->id,
                    'voucher' => $voucher2->voucher,
                    'azienda' => [
                        'id' => $companies[0]->id,
                        'ragioneSociale' => $companies[0]->ragioneSociale,
                    ]
                ],
                [
                    'azienda_id' => $companies[1]->id,
                    'voucher' => $voucher3->voucher,
                    'azienda' => [
                        'id' => $companies[1]->id,
                        'ragioneSociale' => $companies[1]->ragioneSociale,
                    ]
                ],
               
                ])
            ;

    }
}
