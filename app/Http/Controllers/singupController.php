<?php

namespace App\Http\Controllers;

use App\Http\Requests\registerRequest;
use App\Models\Escolaridad;
use App\Models\Headquarter;
use App\Models\Schooling;
use App\Models\Sector;
use App\Models\Sede;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class singupController extends Controller
{
    public function singup()
    {
        if (Auth::check()) {
            return redirect()->route('proveicydet.propuesta');
        }
        $escolaridades = Schooling::all();
        $sedes = Headquarter::all();
        $sectores = Sector::all();
        return view('screens.singup', compact('sedes', 'escolaridades','sectores'));
    }

    public function store(registerRequest $request)
    {

        $xx = "20"; $xix = "19"; $anioActual = "2022";

        $curp = array($request->curp); //GUARDAR EN UN ARRAY LA CURP
        
        $fecha = $curp[0][4].$curp[0][5]; //GUARDAR LOS DIGITOS DEL AÑO

        if ($fecha >= 00 && $fecha <= 22) { //VALIDAR SI ES DEL AÑO 2000
            $anio = $xx . $fecha;
        }else if($fecha >= 23){ //VALIDAR SI ES DEL AÑO 1900
            $anio = $xix . $fecha;
        }
        
        $edad = $anioActual - $anio;//OBTENER LA EDAD -> 2022 - AÑO
        
        if ($edad >=18) { //VALIDAR SI ES MAYOR DE EDAD
            $userr = User::create($request->validated());
            return view('messages.success');
            return $request;
        }else{
        return back()->withErrors([
            'message' => 'Para participar necesitas ser mayor de edad'
        ]);
        //return $request;
        }
        
    }
}
