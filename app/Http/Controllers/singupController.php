<?php

namespace App\Http\Controllers;


use App\Models\Usuario;
use Illuminate\Http\Request;

class singupController extends Controller
{
    public function singup(){
    //    get al users
        //$usuario = Usuario::all();

        return view('screens.singup');
    }

    public function compare(Request $request){
        //aqui va la logica para el inicio de sesión
        return $request;
    }
}
