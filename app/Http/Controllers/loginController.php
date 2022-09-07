<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function login()
    {

        return view('screens.login');
    }

    public function compare(loginRequest $request)
    {
        
         

    }





    public function authenticated(Request $request, $usuario)
    {
        return redirect('coveicydet/propuesta');
    }
}
