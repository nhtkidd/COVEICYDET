<?php

namespace App\Http\Controllers;

use App\Models\Od;
use App\Models\Place;
use App\Models\Annexe;
use App\Models\Proposal;
use App\Models\Area;
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
        if (Auth::check()){
            if(auth()->user()->role == "admin"){
                return redirect()->route('proveicydet.admin');
            }
            $idUsuario = auth()->user()->idUser;
            $usuario = Proposal::where('fk_idUsers','=',$idUsuario)->count();
            if ($usuario < 2) {
                $ods = Od::all();
                $places = Place::all();
                $data = Annexe::all();
                $areas = Area::all();
                return view('screens.propuesta', compact('ods', 'places','data','areas'));
            }else{
                return redirect()->route('proveicydet.inicio');
            }
        }
        return view('screens.login');
        /**/
    }

    public function edit($id){
        
        if (Auth::check()){
            if(auth()->user()->role == "admin"){
                return redirect()->route('proveicydet.admin');
            }
            $ods = Od::all();
            $places = Place::all();
            $annexes = Annexe::all();
            $areas = Area::all();
            $proposal = Proposal::findOrFail($id);
            if ($proposal->fk_idUsers == auth()->user()->idUser) {
            //if ($proposal->idProposal == $id) {
                if ($proposal->finished == null) {
                    $propuesta = Proposal::where('idProposal','=',$id)->get();
                    return view('screens.editPropuesta',compact('ods','places','annexes','propuesta','areas'));
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
        }
        return view('screens.login');
        
        //
        //return $propuesta->idProposal;
    }
    public function annexes(){
        
        $annexes = Annexe::where('areas','like','%'. 4 .'%')->get();
        return view('screens.annexe',compact('annexes'));
    }

    public function mostrar($id){
        if (Auth::check()){
            if(auth()->user()->role == "admin"){
                return redirect()->route('proveicydet.admin');
            }
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
        }
        return view('screens.login');

        //return view('screens.annexes',compact('ods','places','annexes','propuesta'));
    }

    
    public function update(propuestaRequest $request,$id){

        $propuesta = Proposal::findOrFail($id);
        $idUsuario = auth()->user()->idUser;
        $ods = $request->fk_idOds;
        $request->fk_idOds = implode(",", $ods);
        
        if ($request->fk_idUsers != $idUsuario || $propuesta->finished == true) {
            abort(403,'ACCESO DENEGADO');
        }
        /*if ($propuesta->finished == 'true' ) {
            return redirect(route('proveicydet.inicio'))->with('denegado','No puedes modificar propuestas que ya han sido enviadas.');
        }*/

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
                'name' => [
                    'Required',
                    'max:100',
                    'regex:/^[a-zA-ZÑñáéíóúÁÉÍÓÚ\s]+$/'
                ],
                'objetive' => [
                    'Required',
                    'max:500',
                    'regex:/^[^&|<>#@]+$/'
                ],
                'description' => [
                    'Required',
                    'max:2500',
                    'regex:/^[^&|<>#@]+$/'
                ],
                'group' => [
                    'Required',
                    'max:2500',
                    'regex:/^[^&|<>#@]+$/'
                ],
                'reach' => [
                    'Required',
                    'max:2500',
                    'regex:/^[^&|<>#@]+$/'
                ],
                'finished' => 'Required',
                'fk_idPlaces' => 'Required|exists:places,name',
                'fk_idOds' => 'required|exists:ods,idOds|max:5',
                'fk_idUsers' => 'Required|exists:users,idUser',
                'area' => 'Required|exists:areas,name',
                'fk_idAnnexe' => 'Required|exists:annexes,idAnnexes'
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
        $proposal = Proposal::where('fk_idUsers','=',$idUsuario)->count();
        if ($proposal == 2) {
            return redirect(route('proveicydet.inicio'))->with('denegado','Solo puedes crear 2 propuestas.');
        }
        $proposal2 = Proposal::where('fk_idUsers','=',$idUsuario)->where('finished','=',null)->count();
        if ($proposal2 == 1) {
            return redirect(route('proveicydet.inicio'))->with('denegado','DENEGADO.');
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
                'name' => [
                    'Required',
                    'max:100',
                    'regex:/^[a-zA-ZÑñáéíóúÁÉÍÓÚ\s]+$/'
                ], 
                'objetive' => [
                    'Required',
                    'max:500',
                    'regex:/^[^&|<>#@]+$/'
                ],
                'description' => [
                    'Required',
                    'max:2500',
                    'regex:/^[^&|<>#@]+$/'
                ],
                'group' => [
                    'Required',
                    'max:2500',
                    'regex:/^[^&|<>#@]+$/'
                ],
                'reach' => [
                    'Required',
                    'max:2500',
                    'regex:/^[^&|<>#@]+$/'
                ],
                'finished' => 'Required',
                'fk_idPlaces' => 'Required|exists:places,name',
                'fk_idOds' => 'required|exists:ods,idOds|max:5',
                'fk_idUsers' => 'Required|exists:users,idUser',
                'area' => 'Required|exists:areas,name',
                'fk_idAnnexe' => 'Required|exists:annexes,idAnnexes'
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
