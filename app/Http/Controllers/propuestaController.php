<?php

namespace App\Http\Controllers;

use App\Models\Od;
use App\Models\Place;
use App\Models\Annexe;
use App\Models\Proposal;
use Illuminate\Http\Request;


class propuestaController extends Controller
{
    public function propuesta()
    {
        $ods = Od::all();
        $places = Place::all();
        $data = Annexe::all();
        return view('screens.propuesta', compact('ods', 'places','data'));
    }

    public function edit($id){
        echo $id;
        //return view('screens.annexes',compact('data'));
    }

    public function store(Request $request)
    {
        $ods = $request->fk_idOds;
        $idOds = implode(",", $ods);
        $terminado = $request->input("finished");

        function str_limit($value, $limit = 100, $end = '...')
        {
            if (mb_strwidth($value, 'UTF-8') <= $limit) {
                return $value;
            }
            return rtrim(mb_strimwidth($value, 0, $limit, '', 'UTF-8')) . $end;
        }
        
        $limite = str_limit($idOds, 9, "");
        //logica para determinar si el usuario guarda o termina la propuesta
        if ($terminado == 'true') {
            $propuesta = new Proposal;
            $propuesta->name = $request->input('name');
            $propuesta->objetive = $request->input('objetive');
            $propuesta->description = $request->input('description');
            $propuesta->group = $request->input('group');
            $propuesta->reach = $request->input('reach');
            $propuesta->finished = $request->input('finished');
            $propuesta->fk_idPlaces = $request->input('fk_idPlaces');
            $propuesta->fk_idOds = $limite;
            $propuesta->fk_idUsers = $request->input('fk_idUsers');
            $propuesta->save();
            return view('screens.inicio');
        } else {
            //return $request;

            $propuesta = new Proposal;
            $propuesta->name = $request->input('name');
            $propuesta->objetive = $request->input('objetive');
            $propuesta->description = $request->input('description');
            $propuesta->group = $request->input('group');
            $propuesta->reach = $request->input('reach');
            $propuesta->fk_idPlaces = $request->input('fk_idPlaces');
            $propuesta->fk_idOds = $limite;
            $propuesta->fk_idUsers = $request->input('fk_idUsers');
            $propuesta->save();
            //return view('screens.editPropuesta');
            return redirect()->route('proveicydet.inicio');
        }
    }
}
