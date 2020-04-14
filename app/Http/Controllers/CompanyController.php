<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis; 
use App\Company;

class CompanyController extends Controller
{
    
    /**
     * get all companies
     * 
     * @return 
     * 
     */
    public function getCompanies(){


        if ($companies = Redis::get('companies.all')) { 
            return response()->json($companies, 200);
        } 

        $companies = Company::all();

        Redis::setex('companies.all', 60 * 60 * 24, $companies); 

        return response()->json($companies, 200);

    }

    /**
     * get company vouchers
     * 
     * @return 
     * 
     */
    public function getVouchers(Request $request, $id){

        $company = Company::with('vouchers')->find($id);

        return response()->json($company, 200);

    }



}
