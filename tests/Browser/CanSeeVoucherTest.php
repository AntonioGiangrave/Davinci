<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Azienda;
use App\Voucher;

class CanSeeVoucherTest extends DuskTestCase
{
    
    use DatabaseMigrations;

    /**
     * @group see-voucher
     * 
     * @return void
     */
    public function testCanSeeCompany()
    {

        $companies = factory(Azienda::class, 2)->create();

        $voucher[] = factory(Voucher::class)->create([
            'azienda_id' => $companies[0]->id,  
            'gratuito' => 1,
            'sconto' => 0]);
        
        $voucher[] = factory(Voucher::class)->create([
            'azienda_id' => $companies[0]->id,  
            'gratuito' => 1,
            'sconto' => 0]);
        
        
        $voucher[] = factory(Voucher::class)->create([
            'azienda_id' => $companies[1]->id,  
            'gratuito' => 1,
            'sconto' => 0]);
        

        $this->browse(function (Browser $browser) use($voucher) {
            $browser->visit('/voucherlist')
                    ->assertSee($voucher[0]->voucher)
                    ->assertSee($voucher[1]->voucher)
                    ->assertSee($voucher[2]->voucher)
                    ;
        });
    }
}
