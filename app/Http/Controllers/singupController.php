<?php

namespace App\Http\Controllers;

use App\Http\Requests\registerRequest;
use App\Models\Escolaridad;
use App\Models\Headquarter;
use App\Models\Schooling;
use App\Models\Sede;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class singupController extends Controller
{
    public function singup()
    {
        if (Auth::check()) {
            return redirect()->route('coveicydet.propuesta');
        }
        $escolaridades = Schooling::all();
        $sedes = Headquarter::all();
        return view('screens.singup', compact('sedes', 'escolaridades'));
    }

    public function store(registerRequest $request)
    {
        //  return $request;
        //  $userr = $this->create($request->all());
        $userr = User::create($request->validated());
         return view('messages.success');

    }
}
