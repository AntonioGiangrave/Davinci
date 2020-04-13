<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;

class CompanyController extends Controller
{
    //

    public function showAll(){

        $companies = Company::all();

        return response()->json($companies, 200);

    }

    public function getVouchers(Request $request, $id){

        $company = Company::with('vouchers')->find($id);

        return response()->json($company, 200);

    }



}
