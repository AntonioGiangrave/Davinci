<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Azienda;

class GetCompaniesTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * @group api-get-companies
     *
     * @return void
     */
    public function testGetCompanies()
    {
        $company1 = factory(Azienda::class)->create();

        $company2 = factory(Azienda::class)->create();


        $response = $this->get('/api/aziende');


        $response 
            ->assertStatus(200)
            ->assertJsonFragment([
                'id' => $company1->id,
                'ragioneSociale'=> $company1->ragioneSociale,
            ])
            ->assertJsonFragment([
                'id' => $company2->id,
                'ragioneSociale'=> $company2->ragioneSociale,
            ]);

    }
}