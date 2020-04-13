<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Company;
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

        $company = Company::create([
            'ragioneSociale' => $request->ragioneSociale
        ]);

        $vouchers = generateVoucher($company->ragioneSociale, $request->numeroVoucher);

        foreach ($vouchers as $voucher) {
            Voucher::create([
                'company_id' => $company->id,
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

    public function getVouchersList(Request $request){

        $Vouchers = Voucher::with('company')->orderBy('created_at', 'desc')->get();

        return response()->json($Vouchers, 200);

    }

}
