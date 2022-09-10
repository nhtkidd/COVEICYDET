<?php

namespace App\Http\Controllers;

use App\Models\Od;
use App\Models\Place;
use App\Models\Annexe;
use App\Models\Proposal;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


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
        $ods = Od::all();
        $places = Place::all();
        $annexes = Annexe::all();
        //$propuesta = Proposal::find($id);
        $propuesta = Proposal::where('idProposal','=',$id)->get();
        return view('screens.editPropuesta',compact('ods','places','annexes','propuesta'));
    }

    public function update(Request $request,$id){
        //return $request;

        $propuesta = Proposal::findOrFail($id);
        $finalizado = $request->input("finished");
        $ods = implode(',',$request->input('fk_idOds'));
        $propuesta->name = $request->input('name');
        $propuesta->objetive = $request->input('objetive');
        $propuesta->description = $request->input('description');
        $propuesta->group = $request->input('group');
        $propuesta->reach = $request->input('reach');
        
        $propuesta->fk_idPlaces = $request->input('fk_idPlaces');
        $propuesta->fk_idOds = $ods;
        $propuesta->fk_idUsers = $request->input('fk_idUsers');
        $propuesta->area = $request->input('area');
        $propuesta->fk_idAnnexe = $request->input('annexes');
        if ($finalizado == 'true') {
            
            /**/
            $propuesta->finished = $request->input('finished');
            $propuesta->save();
        }else{
            $propuesta->save();
        }

        return redirect()->route('proveicydet.inicio');
    }


    public function store(Request $request)
    {
        $ods = $request->fk_idOds;
        $terminado = $request->input("finished");
        //$idOds = implode(",", $ods);
        $ods = implode(',',$request->input('fk_idOds'));
        $propuesta = new Proposal;
        //logica para determinar si el usuario guarda o termina la propuesta
        if ($terminado == 'true') {
            $propuesta->name = $request->input('name');
            $propuesta->objetive = $request->input('objetive');
            $propuesta->description = $request->input('description');
            $propuesta->group = $request->input('group');
            $propuesta->reach = $request->input('reach');
            $propuesta->finished = $request->input('finished');
            $propuesta->fk_idPlaces = $request->input('fk_idPlaces');
            $propuesta->fk_idOds = $ods;
            $propuesta->fk_idUsers = $request->input('fk_idUsers');
            $propuesta->area = $request->input('area');
            $propuesta->fk_idAnnexe = $request->input('annexes');
            $propuesta->save();
        } else {
            //return $request;
            $propuesta->name = $request->input('name');
            $propuesta->objetive = $request->input('objetive');
            $propuesta->description = $request->input('description');
            $propuesta->group = $request->input('group');
            $propuesta->reach = $request->input('reach');
            $propuesta->fk_idPlaces = $request->input('fk_idPlaces');
            $propuesta->fk_idOds = $ods;
            $propuesta->fk_idUsers = $request->input('fk_idUsers');
            $propuesta->area = $request->input('area');
            $propuesta->fk_idAnnexe = $request->input('annexes');
            $propuesta->save();
        }
        return redirect()->route('proveicydet.inicio');
    }
}
