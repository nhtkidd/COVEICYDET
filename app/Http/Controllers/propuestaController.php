<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class propuestaController extends Controller
{
    public function propuesta()
    {

        return view('screens.propuesta');
    }

    public function store(Request $request)
    {

        $terminado = $request->input("finished");

        //logica para determinar si el usuario guarda o termina la propuesta
        if ($terminado == 'true') {
       
            return $request;
        } else {
            return view('screens.propuesta');
        }
    }
}
