<?php

namespace App\Http\Controllers;

use App\Models\Od;
use App\Models\Place;
use Illuminate\Http\Request;

class propuestaController extends Controller
{
    public function propuesta()
    {
        $ods = Od::all();
        $places = Place::all();
        return view('screens.propuesta',compact('ods','places'));
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
