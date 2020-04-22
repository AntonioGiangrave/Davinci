<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Company;

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
        $companies = factory(Company::class, 2)->create();

        $response = $this->get('/api/companies');

        $response
            ->assertStatus(200)
            ->assertJsonFragment([
                'id' => $companies[0]->id,
                'ragioneSociale' => $companies[0]->ragioneSociale,
            ])
            ->assertJsonFragment([
                'id' => $companies[1]->id,
                'ragioneSociale' => $companies[1]->ragioneSociale,
            ]);
    }
}
