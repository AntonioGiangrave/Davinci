<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Azienda;

class AziendaController extends Controller
{
    //

    public function showAll(){

        $aziende = Azienda::all();

        return response()->json($aziende, 200);

    }



}
