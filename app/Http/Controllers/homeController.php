<?php

namespace App\Http\Controllers;

use App\Models\Headquarter;
use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    //
    public function inicio(){
        if (Auth::check()){
            
            $id = auth()->user()->idUser;
            $proposal = Proposal::where('fk_idUsers','=',$id)->get();
            //$headquarterConfirmed = User::select('headquarterConfirmed')->where('idUser','=',$id)->get();
            $proposalsFinished = Proposal::where('finished','=','true')->where('fk_idUsers','=',$id)->count();


            $user = User::find($id);
            $confirmHeadquarter = $user->headquarterConfirmed;
            //encontrar y mostrar la sede de participacion
            $idHq = $user->fk_idHeadquarters;

            $findHeadquarterUser = Headquarter::find($idHq);
    

            $sedes = Headquarter::all();
            
            return view('screens.inicio',compact('proposal','proposalsFinished','confirmHeadquarter','findHeadquarterUser','sedes'));
            
        }
        return view('screens.login');
    }
}
