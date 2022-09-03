<?php

namespace App\Http\Controllers;

use App\Http\Requests\registerRequest;
use App\Models\Escolaridad;
use App\Models\Sede;
use App\Models\Usuario;

class loginController extends Controller
{
    public function login()
    {
        $escolaridades = Escolaridad::all();
        $sedes = Sede::all();
        return view('screens.login', compact('sedes', 'escolaridades'));
    }

    public function store(registerRequest $request)
    {
        //return $request;

    $userr = Usuario::create($request->validated());

    

    }
}
