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



}
