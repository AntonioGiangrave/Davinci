<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateVoucherTest extends TestCase
{
    

    Use DatabaseMigrations;
    
    /**
     * 
     * @group create-voucher
     * 
     */
    public function testCreateVoucher(){

        $params = [
            'ragioneSociale' => 'TestCompany srl',
            'numeroVoucher' => 10,
            'gratuito' => 1,
            'sconto' => null
        ];

        $response = $this->postJson('/api/create-voucher', $params);

        $response
            ->assertStatus(201)
            ->assertJson([
                'ragioneSociale' => 'TestCompany srl',
                'gratuito' => 1,
                'sconto' => null
            ])
            ->assertJsonStructure([
                'ragioneSociale',
                'gratuito',
                'sconto',
                'vouchers'
            ]);

    }
    
    /**
     * 
     * @group create-voucher-conflict
     * 
     */
    public function testCreateVoucherConflict(){

        $params = [
            'ragioneSociale' => 'TestCompany srl',
            'numeroVoucher' => 10,
            'gratuito' => 1,
            'sconto' => 10
        ];

        $response = $this->postJson('/api/create-voucher', $params);

        $response->assertStatus(422);

    }

}
