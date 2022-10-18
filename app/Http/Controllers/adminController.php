<?php

namespace App\Http\Controllers;

use App\Models\Headquarter;
use App\Models\Schooling;
use App\Models\Sector;
use App\Models\Sede;
use App\Models\User;
use App\Models\Od;
use App\Models\Place;
use App\Models\Annexe;
use App\Models\Proposal;
use App\Models\Area;
use App\Http\Requests\registerRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class adminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function proposal(Request $request)
    {
        $sectorFind=$request->get('sectors');
        $sedeFind=$request->get('sedes');
        
        $proposals = DB::table('proposals')
        ->join('users','users.idUser','=','proposals.fk_idUsers')
        ->join('headquarters','headquarters.idHeadquarters','=','users.fk_idHeadquarters')
        ->where('status', '=', null)
        ->where('finished','=','true')
        ->where('users.sector','like','%'.$sectorFind.'%')
        ->where('headquarters.name','like','%'.$sedeFind.'%')
        ->select('proposals.*')->paginate(10);
        //$proposals = Proposal::paginate(10);
        $users = User::all();
        $sedes = Headquarter::all();
        $sectors = Sector::all();
        return view('admin.proposals', compact('proposals', 'users', 'sedes', 'sectors','sectorFind','sedeFind'));
        /* $buscarpor=$request->get('sectors');
        $proposals = DB::table('proposals')->where('status', '=', null)->where('')->paginate(10);
        //$proposals = Proposal::paginate(10);
        $users = User::all();
        $sedes = Headquarter::all();
        $sectors = Sector::all();
        return view('admin.proposals', compact('proposals', 'users', 'sedes', 'sectors','buscarpor')); */
    }

    public function proposalAccepted(Request $request)
    {
        $sectorFind=$request->get('sectors');
        $sedeFind=$request->get('sedes');
        
        $proposals = DB::table('proposals')
        ->join('users','users.idUser','=','proposals.fk_idUsers')
        ->join('headquarters','headquarters.idHeadquarters','=','users.fk_idHeadquarters')
        ->where('status', '=', 'true')
        ->where('finished','=','true')
        ->where('users.sector','like','%'.$sectorFind.'%')
        ->where('headquarters.name','like','%'.$sedeFind.'%')
        ->select('proposals.*')->paginate(10);
        //$proposals = Proposal::paginate(10);
        $users = User::all();
        $sedes = Headquarter::all();
        $sectors = Sector::all();
        return view('admin.proposalsAccepted', compact('proposals', 'users', 'sedes', 'sectors','sectorFind','sedeFind'));
    }

    public function crudUser(){
        $escolaridades = Schooling::all();
        $sedes = Headquarter::all();
        $usuarios = User::paginate(10);
        return view('admin.users', compact('escolaridades', 'sedes', 'usuarios'));
    }

    public function proposalRefused(Request $request)
    {
        $sectorFind=$request->get('sectors');
        $sedeFind=$request->get('sedes');
        
        $proposals = DB::table('proposals')
        ->join('users','users.idUser','=','proposals.fk_idUsers')
        ->join('headquarters','headquarters.idHeadquarters','=','users.fk_idHeadquarters')
        ->where('status', '=', 'false')
        ->where('finished','=','true')
        ->where('users.sector','like','%'.$sectorFind.'%')
        ->where('headquarters.name','like','%'.$sedeFind.'%')
        ->select('proposals.*')->paginate(10);
        //$proposals = Proposal::paginate(10);
        $users = User::all();
        $sedes = Headquarter::all();
        $sectors = Sector::all();
        return view('admin.proposalsRefused', compact('proposals', 'users', 'sedes', 'sectors','sectorFind','sedeFind'));
    }

    public function editar($id)
    {
        $escolaridades = Schooling::all();
        $sedes = Headquarter::all();
        $sectores = Sector::all();
        $usuario = User::where('idUser', '=', $id)->get();
        return view('admin.updateUser', compact('escolaridades', 'sedes', 'sectores', 'usuario'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|max:50|regex:/^[a-zA-ZÑñáéíóúÁÉÍÓÚ\s]+$/',
            'last_name' => 'required|max:50|regex:/^[a-zA-ZÑñáéíóúÁÉÍÓÚ\s]+$/',
            'email' => [
                'required',
                'max:50',
                'email',
                'regex:/[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]/'
            ],
            'fk_idEducations' => 'required|exists:schoolings,idEducations',
            'participation' => 'required|boolean',
            'fk_idHeadquarters' => 'sometimes|exists:headquarters,idHeadquarters',
        ]);
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->fk_idEducations = $request->input('fk_idEducations');
        $user->participation = $request->input('participation');
        if ($request->input('participation') == 0) {
            $user->fk_idHeadquarters == null;
        }
        $user->fk_idHeadquarters = $request->input('fk_idHeadquarters');

        $user->save();
        return redirect()->route('proveicydet.admin');
    }

    public function delete($id)
    {
        User::destroy($id);
        return back();
    }

    public function create()
    {
        $escolaridades = Schooling::all();
        $sedes = Headquarter::all();
        $sectores = Sector::all();
        return view('admin.createUser', compact('sedes', 'escolaridades', 'sectores'));
    }

    public function view($id)
    {
        $ods = Od::all();
        $places = Place::all();
        $annexes = Annexe::all();
        $users = User::all();
        $proposal = Proposal::findOrFail($id);
   
        $propuesta = Proposal::where('idProposal', '=', $id)->get();
        return view('admin.viewProposal', compact('ods', 'places', 'annexes', 'propuesta', 'users'));

    }

    public function validateProposal(Request $request, $id)
    {
        $propuesta = Proposal::findOrFail($id);
        $emailUser = User::findOrFail($propuesta->fk_idUsers);
        $email = $emailUser->email;

        if ($request->status == 'Aceptar') {
            $propuesta->status = 'true';
            $propuesta->save();


            Mail::send('mails.proposalAcepted',['name' => $propuesta->name], function ($message) use ($email) {
                $message->to($email);
                $message->subject('Propuesta aceptada');
            }); 

            return redirect()->route('proveicydet.admin.proposal')->with([
                'Aceptado' => 'La propuesta ha sido aceptada.'
            ]);
            //return $request;
        } elseif ($request->status == 'Rechazar') {
            $propuesta->status = 'false';
            $propuesta->save();

            Mail::send('mails.proposalDecline',['name' => $propuesta->name], function ($message) use ($email) {
                $message->to($email);
                $message->subject('Propuesta rechazada');
            });

            return redirect()->route('proveicydet.admin.proposal')->with([
                'Rechazado' => 'La propuesta ha sido rechazada.'
            ]);
            //return $request;
        } else {
            return back()->withErrors([
                'message' => 'Acceso Denegado'
            ]);
        }
    }
}
