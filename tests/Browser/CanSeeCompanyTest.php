<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Company;

class CanSeeCompanyTest extends DuskTestCase
{

    use DatabaseMigrations;

    /**
     * @group see-company
     * 
     * @return void
     */
    public function testCanSeeCompany()
    {

        $company = factory(Company::class)->create();

        $this->browse(function (Browser $browser) use($company) {
            $browser->visit('/')
                    ->waitForText($company->ragioneSociale);
        });
    }
}
