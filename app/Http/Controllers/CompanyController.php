<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache; 
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

        $cacheKey = 'companies.all';

        if(Cache::has($cacheKey)){
            return response()->json(Cache::get($cacheKey), 200);
        }

        $companies = Company::all();

        Cache::put($cacheKey, $companies);

        return response()->json($companies, 200);

    }

    /**
     * get company vouchers
     * 
     * @return 
     * 
     */
    public function getVouchers(Request $request, $id){

        $cacheKey = 'company'.$id;

        if(Cache::has($cacheKey)){
            return response()->json(Cache::get($cacheKey), 200);
        }

        $company = Company::with('vouchers')->find($id);

        Cache::put($cacheKey, $company);

        return response()->json($company, 200);

    }



}
