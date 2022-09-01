<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
   public function login(){
      return view('screens.login');
  }

  public function store(Request $request){
      //aqui va la logica para el registro
      return $request;
  }
}
