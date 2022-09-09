<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;

class homeController extends Controller
{
    //
    public function inicio(){
        $id = auth()->user()->idUser;
        $proposal = Proposal::where('fk_idUsers','=',$id)->get();
        return view('screens.inicio',compact('proposal'));
    }
}
