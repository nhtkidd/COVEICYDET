<?php

namespace App\Http\Controllers;

use App\Http\Requests\registerRequest;
use App\Models\Escolaridad;
use App\Models\Sede;
use App\Models\Usuario;



class singupController extends Controller
{
    public function singup()
    {
        $escolaridades = Escolaridad::all();
        $sedes = Sede::all();
        return view('screens.singup', compact('sedes', 'escolaridades'));
    }

    public function store(registerRequest $request)
    {
        //return $request;

        $userr = Usuario::create($request->validated());
        return view('messages.success');

    }
}
