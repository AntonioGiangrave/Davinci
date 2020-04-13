<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Azienda;
use App\Voucher;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function createVoucher(Request $request){


        $validatedData = $request->validate([
            'ragioneSociale' => 'required',
            'numeroVoucher' => 'required',
        ]);


        if ($request->sconto && $request->gratuito) {
            return response()->json('Error: sconto and gratuito not null', 422);
        }

        $company = Azienda::create([
            'ragioneSociale' => $request->ragioneSociale
        ]);

        $vouchers = generateVoucher($company->ragioneSociale, $request->numeroVoucher);

        foreach ($vouchers as $voucher) {
            Voucher::create([
                'azienda_id' => $company->id,
                'voucher' => $voucher, 
                'gratuito' => $request->gratuito,
                'sconto' => $request->sconto,
            ]);
        }

        return response()->json([
            'vouchers' => $vouchers,
            'ragioneSociale' => $company->ragioneSociale,
            'gratuito' => $request->gratuito,
            'sconto' => $request->sconto,

        ], 201);

    }

}
