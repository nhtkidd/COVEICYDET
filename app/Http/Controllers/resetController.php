<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Reset;

class resetController extends Controller
{
    //Muestro el formulario para introducir el email
    public function email(){
        return view('screens.forgot');
    }

    //Generar y enviar el enlace de recuperar password
    public function enlace(Request $request){
        //validacion de email
        $request->validate([
            'email'=>'required|email|exists:users',
        ]);

        //Generación de token y almacenarlo en tabla
        $token = Str::random(64);
        
        DB::table('resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        //Envio de email al usuario
        Mail::send('mails.token', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Cambiar contraseña');
        });

        return back()->with('success','Te hemos enviado un email a tu correo electrónico con un enlace para realizar el cambio de contraseña.');
    }

    //Muestro el formulario para cambiar la clave
    public function clave($token)
    {
        return view('screens.update', ['token' => $token]);
    }

    //cambio la clave
    public function cambiar(Request $request)
    {
        //Valido datos
        $request->validate([
            'email' => 'Required|email|exists:resets,email',
            'password' => 'Required|min:8|max:16|confirmed',
            'password_confirmation' => 'Required'
        ]);

        
            //Compruebo token válido
            $comprobarToken = DB::table('resets')->where(['email' => $request->email, 'token' => $request->token])->first();
            if(!$comprobarToken){
                return back()->withInput()->with('danger','El enlace no es válido');
            }

            //Actualizo password
            User::where('email', $request->email)->update(['password' => bcrypt($request->password)]);

            //Borro token para que no se pueda volver a usar
            DB::table('resets')->where(['email'=> $request->email])->delete();

            //Retorno
            //return redirect('acceder')->with('success','La contraseña se ha cambiado correctamente.');
            return redirect(route('proveicydet.login'))->with('success','La contraseña se ha cambiado correctamente.');
        

        
    }
    
}
