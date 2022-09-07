<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('coveicydet.propuesta');
        }
        return view('screens.login');
    }

    public function compare(loginRequest $request)
    {
        $credentials = $request->getCredentials();
       
    //     if(auth()->attempt($credentials)==false){
    //         return back()->withErrors([
    //             'message' => 'El correo o la contraseña son incorrectos'
    //         ]);
    //     }
    //     return redirect()->route('coveicydet.propuesta');
    // }

       $query = Auth::validate($credentials);

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        $mamate = Auth::login($user);
        dd($mamate);
    
        // if (!Auth::validate($credentials)) :
        //     dd('error');
        //     return redirect()->to('screens.login')
        //         ->withErrors(trans('auth.failed'));
        // endif;
        // $user = Auth::getProvider()->retrieveByCredentials($credentials);


        // Auth::login($user);

        // return $this->authenticated($request, $user);
    }

    // protected function authenticated(Request $request, $user)
    // {
    //     return redirect()->route('coveicydet.propuesta');
    // }
}
