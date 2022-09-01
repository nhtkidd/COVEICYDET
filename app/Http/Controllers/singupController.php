<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class singupController extends Controller
{
    public function singup(){
        return view('screens.singup');
    }

    public function compare(Request $request){
        //aqui va la logica para el inicio de sesión
        return $request;
    }
}
