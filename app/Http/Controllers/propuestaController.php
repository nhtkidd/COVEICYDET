<?php

namespace App\Http\Controllers;

use App\Models\Od;
use App\Models\Place;
use App\Models\Annexe;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Mail\confirmationMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class propuestaController extends Controller
{
    public function propuesta()
    {
        $idUsuario = auth()->user()->idUser;
        $usuario = Proposal::where('fk_idUsers','=',$idUsuario)->count();
        if ($usuario < 2) {
            $ods = Od::all();
            $places = Place::all();
            $data = Annexe::all();
            return view('screens.propuesta', compact('ods', 'places','data'));
        }else{
            return redirect()->route('proveicydet.inicio');
        }
        /**/
    }

    public function edit($id){
        $ods = Od::all();
        $places = Place::all();
        $annexes = Annexe::all();
        $proposal = Proposal::findOrFail($id);
        if ($proposal->fk_idUsers == auth()->user()->idUser) {
        //if ($proposal->idProposal == $id) {

            if ($proposal->finished == null) {
                $propuesta = Proposal::where('idProposal','=',$id)->get();
                return view('screens.editPropuesta',compact('ods','places','annexes','propuesta'));
            }else{
                return back()->withErrors([
                    'message' => 'No puedes acceder a otras propuestas'
                ]);
            }
            
        }else{
            return back()->withErrors([
                'message' => 'No puedes acceder a otras propuestas'
            ]);
        }
        //
        //return $propuesta->idProposal;
    }
    public function annexes(){
        
        $annexes = Annexe::where('areas','like','%'. 4 .'%')->get();
        return view('screens.annexes',compact('annexes'));
    }

    public function mostrar($id){
        $ods = Od::all();
        $places = Place::all();
        $annexes = Annexe::all();
        //$propuesta = Proposal::find($id);
        //$propuesta = Proposal::where('idProposal','=',$id)->get();
        $proposal = Proposal::findOrFail($id);
        if ($proposal->fk_idUsers == auth()->user()->idUser) {
        //if ($proposal->idProposal == $id) {

            if ($proposal->finished == "true") {
                $propuesta = Proposal::where('idProposal','=',$id)->get();
                return view('screens.pdf',compact('ods','places','annexes','propuesta'));
            }else{
                return back()->withErrors([
                    'message' => 'No puedes acceder a otras propuestas'
                ]);
            }
            
        }else{
            return back()->withErrors([
                'message' => 'No puedes acceder a otras propuestas'
            ]);
        }
        
        
        //return view('screens.annexes',compact('ods','places','annexes','propuesta'));
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

            $emailUser = auth()->user()->email;
            $nameProposal = $propuesta->name;
            Mail::to($emailUser)->send(new confirmationMail($nameProposal)); 
            return redirect()->route('proveicydet.inicio');

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
        //logica para determinar si el usuario guarda o termina la propuesta
        if ($terminado == 'true') {
            
            $propuesta->finished = $request->input('finished');
            $propuesta->save();

            $emailUser = auth()->user()->email;
            $nameProposal = $propuesta->name;
            Mail::to($emailUser)->send(new confirmationMail($nameProposal)); 
            
        } else {
            //return $request;
            
            $propuesta->save();
        }
        return redirect()->route('proveicydet.inicio');
    
    }
}
