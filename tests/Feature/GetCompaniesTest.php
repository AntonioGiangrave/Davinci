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
        $companies = factory(Azienda::class, 2)->create();


        $response = $this->get('/api/aziende');


        $response 
            ->assertStatus(200)
            ->assertJsonFragment([
                'id' => $companies[0]->id,
                'ragioneSociale'=> $companies[0]->ragioneSociale,
            ])
            ->assertJsonFragment([
                'id' => $companies[1]->id,
                'ragioneSociale'=> $companies[1]->ragioneSociale,
            ]);

    }
}