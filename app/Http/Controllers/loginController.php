<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function login()
    {
        //    get al users
        //$usuario = Usuario::all();

        return view('screens.login');
    }

    public function compare(Request $request)
    {
        //aqui va la logica para el inicio de sesión
        return $request;
    }
}
