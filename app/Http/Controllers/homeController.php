<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    //
    public function inicio(){
        if (Auth::check()){
            
            $id = auth()->user()->idUser;
            $proposal = Proposal::where('fk_idUsers','=',$id)->get();
            $proposalsFinished = Proposal::where('finished','=','true')->where('fk_idUsers','=',$id)->count();
            return view('screens.inicio',compact('proposal','proposalsFinished'));

        }
        return view('screens.login');
    }
}
