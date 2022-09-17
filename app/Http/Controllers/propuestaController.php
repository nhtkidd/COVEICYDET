<?php

namespace App\Http\Controllers;

use App\Models\Od;
use App\Models\Place;
use App\Models\Annexe;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\propuestaRequest;
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
        return view('screens.annexe',compact('annexes'));
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

    
    public function update(propuestaRequest $request,$id){
        $propuesta = Proposal::findOrFail($id);
        $idUsuario = auth()->user()->idUser;
        $ods = $request->fk_idOds;
        $request->fk_idOds = implode(",", $ods);

        if ($request->fk_idUsers != $idUsuario) {
            abort(403,'ACCESO DENEGADO');
        }

        $propuesta->name = $request->input('name');
        $propuesta->objetive = $request->input('objetive');
        $propuesta->description = $request->input('description');
        $propuesta->group = $request->input('group');
        $propuesta->reach = $request->input('reach');
        $propuesta->fk_idPlaces = $request->input('fk_idPlaces');
        $propuesta->fk_idOds = $request->fk_idOds;
        $propuesta->fk_idUsers = $request->input('fk_idUsers');
        $propuesta->area = $request->input('area');
        $propuesta->fk_idAnnexe = $request->input('fk_idAnnexe');
        $propuesta->finished = $request->input('finished');

        if ($request->finished == "true") {
            $request->validate([
                'name' => 'Required|max:100|regex:/^[a-zA-ZÑñáéíóúÁÉÍÓÚ\s]+$/', 
                'objetive' => 'Required|max:500|regex:/^[a-zA-ZÑñáéíóúÁÉÍÓÚ\s]+$/',
                'description' => 'Required|max:2500|regex:/^[a-zA-ZÑñáéíóúÁÉÍÓÚ\s]+$/',
                'group' => 'Required|max:2500|regex:/^[a-zA-ZÑñáéíóúÁÉÍÓÚ\s]+$/',
                'reach' => 'Required|max:2500|regex:/^[a-zA-ZÑñáéíóúÁÉÍÓÚ\s]+$/',
                'finished' => 'Required',
                'fk_idPlaces' => 'Required',
                'fk_idOds' => 'required|exists:ods,idOds|max:5',
                'fk_idUsers' => 'Required|exists:users,idUser',
                'area' => 'Required',
                'fk_idAnnexe' => 'Required'
            ]);
            
            //return $propuesta;
            $propuesta->save();

            $emailUser = auth()->user()->email;
            $nameProposal = $request->name;
            Mail::to($emailUser)->send(new confirmationMail($nameProposal));
        }elseif($request->finished == null){
            //return $propuesta;
            $propuesta->save();
        }else{
            abort(403,'ACCESO DENEGADO');
        }
        return redirect()->route('proveicydet.inicio');
    }

    
    public function store(propuestaRequest $request){
        $idUsuario = auth()->user()->idUser;
        $ods = $request->fk_idOds;
        $request->fk_idOds = implode(",", $ods);

        if ($request->fk_idUsers != $idUsuario) {
            abort(403,'ACCESO DENEGADO');
        }
        $propuesta = new Proposal;

        $propuesta->name = $request->input('name');
        $propuesta->objetive = $request->input('objetive');
        $propuesta->description = $request->input('description');
        $propuesta->group = $request->input('group');
        $propuesta->reach = $request->input('reach');
        $propuesta->fk_idPlaces = $request->input('fk_idPlaces');
        $propuesta->fk_idOds = $request->fk_idOds;
        $propuesta->fk_idUsers = $request->input('fk_idUsers');
        $propuesta->area = $request->input('area');
        $propuesta->fk_idAnnexe = $request->input('fk_idAnnexe');
        $propuesta->finished = $request->input('finished');

        if ($request->finished == "true") {
            $request->validate([
                'name' => 'Required|max:200|regex:/^[a-zA-ZÑñáéíóúÁÉÍÓÚ\s]+$/', 
                'objetive' => 'Required|max:500|regex:/^[a-zA-ZÑñáéíóúÁÉÍÓÚ\s]+$/',
                'description' => 'Required|max:2500|regex:/^[a-zA-ZÑñáéíóúÁÉÍÓÚ\s]+$/',
                'group' => 'Required|max:2500|regex:/^[a-zA-ZÑñáéíóúÁÉÍÓÚ\s]+$/',
                'reach' => 'Required|max:2500|regex:/^[a-zA-ZÑñáéíóúÁÉÍÓÚ\s]+$/',
                'finished' => 'Required',
                'fk_idPlaces' => 'Required|exists:places,name',
                'fk_idOds' => 'required|exists:ods,idOds|max:5',
                'fk_idUsers' => 'Required|exists:users,idUser',
                'area' => 'Required',
                'fk_idAnnexe' => 'Required'
            ]);
            
            //return $propuesta;
            $propuesta->save();

            $emailUser = auth()->user()->email;
            $nameProposal = $request->name;
            Mail::to($emailUser)->send(new confirmationMail($nameProposal)); 
        }elseif($request->finished == null){
            $propuesta->save();
        }else{
            abort(403,'ACCESO DENEGADO');
        }
        return redirect()->route('proveicydet.inicio');
    }

}
