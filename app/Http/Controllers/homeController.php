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
            return view('screens.inicio',compact('proposal'));

        }
        return view('screens.login');
    }
}
