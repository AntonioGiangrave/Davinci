<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Company;
use App\Voucher;

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

        $voucher[] = factory(Voucher::class)->create([
            'company_id' => $company->id,  
            'gratuito' => 1,
            'sconto' => 0]);

        $voucher[] = factory(Voucher::class)->create([
            'company_id' => $company->id,  
            'gratuito' => 1,
            'sconto' => 0]);

        $this->browse(function (Browser $browser) use($company, $voucher) {
            $browser->visit('/')
                    ->waitFor('tbody')
                    ->assertSee($company->ragioneSociale)
                    ->click('#view-'.$company->id)
                    ->waitFor('tbody')
                    ->pause(1000)
                    ->assertSee($voucher[0]->voucher)
                    ->assertSee($voucher[1]->voucher)
                    ->assertSee($company->ragioneSociale)
                    ;
        });
    }
 
}
