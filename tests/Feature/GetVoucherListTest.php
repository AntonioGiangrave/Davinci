<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Company;
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
        $companies = factory(Company::class, 2)->create();

        $voucher1 = factory(Voucher::class)->create([
            'company_id' => $companies[0]->id,  
            'gratuito' => 1,
            'sconto' => 0]);
        
        $voucher2 = factory(Voucher::class)->create([
            'company_id' => $companies[0]->id,  
            'gratuito' => 1,
            'sconto' => 0]);
        
        
        $voucher3 = factory(Voucher::class)->create([
            'company_id' => $companies[1]->id,  
            'gratuito' => 1,
            'sconto' => 0]);
        

        $response = $this->get('/api/vouchers/');


        $response 
            ->assertStatus(200)
            ->assertJson([
                [   
                    'company_id' => $companies[0]->id,
                    'voucher' => $voucher1->voucher,
                    'company' => [
                        'id' => $companies[0]->id,
                        'ragioneSociale' => $companies[0]->ragioneSociale,
                    ]
                ],
                [
                    'company_id' => $companies[0]->id,
                    'voucher' => $voucher2->voucher,
                    'company' => [
                        'id' => $companies[0]->id,
                        'ragioneSociale' => $companies[0]->ragioneSociale,
                    ]
                ],
                [
                    'company_id' => $companies[1]->id,
                    'voucher' => $voucher3->voucher,
                    'company' => [
                        'id' => $companies[1]->id,
                        'ragioneSociale' => $companies[1]->ragioneSociale,
                    ]
                ],
               
                ])
            ;

    }
}
