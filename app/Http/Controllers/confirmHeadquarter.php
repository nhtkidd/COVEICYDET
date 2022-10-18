<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class confirmHeadquarter extends Controller
{
    public function updateHeadquarter(Request $request){
  
        $idHeadquarterForm = $request->fk_idHeadquarters;
        $id = auth()->user()->idUser;
        $user = User::find($id);
        $idHeadquarter = $user->fk_idHeadquarters;

        $request->validate([
            'fk_idHeadquarters' => 'required|exists:headquarters,idHeadquarters'
        ]);

         if($idHeadquarterForm == $idHeadquarter){
            $user->headquarterConfirmed = 'true';
            $user->save();
         }else{
            $user->headquarterConfirmed = 'true';
            $user->participation = '1';
            $user->fk_idHeadquarters = $idHeadquarterForm;
            $user->save();
         }

         return redirect()->route('proveicydet.inicio');
   

        
    }
}
