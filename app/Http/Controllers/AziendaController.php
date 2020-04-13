<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Azienda;

class AziendaController extends Controller
{
    //

    public function showAll(){

        $companies = Azienda::all();

        return response()->json($companies, 200);

    }

    public function getVouchers(Request $request, $id){

        $company = Azienda::with('vouchers')->find($id);

        return response()->json($company, 200);

    }



}
