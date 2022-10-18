<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;

class fileProposalController extends Controller
{
    public function showForm($id){

        $validateIfExist = Proposal::findOrFail($id)->file;
        if($validateIfExist){
            return redirect()->route('proveicydet.inicio')->withErrors([
                'message' => 'No puedes hacer esta acciòn'
            ]);
        }else{
        $nameProposal = Proposal::findOrFail($id)->name;
        return view ('screens.fileProposal', compact('nameProposal','id'));
        }
    }

    public function storePresentation(Request $request){
        
      

        $id= $request->idProposal;   
        $validateIfExist = Proposal::findOrFail($id)->file;
        if($validateIfExist){
            return redirect()->route('proveicydet.inicio')->withErrors([
                'message' => 'No puedes hacer esta acciòn'
            ]);
        }else{

    
        $req = $request->validate([
            "file" => "required|max:10000|mimes:pdf"
           ]);


        $name = $request->file('file',$req)->getClientOriginalName();
    
        $request->file('file')->storeAS('public/docs',$name);
        $proposal = Proposal::findOrFail($id);
        $proposal->file = $name;
        $proposal->save();
         
        return redirect()->route('proveicydet.inicio');
    }
    }

    public function download(Request $request,$file){        
        //return response()->download(storage_path('app/public/docs/'.$file));

        return storage_path('app/public/docs/'.$file);
    }

}
