<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {


        return [
            'nombre' => 'required',
            'apellidos' => 'required',
            'curp' =>  'required|unique:usuarios', //no te olivdes de poner de nuevos los unique
            'correo' => 'required|email|unique:usuarios',
            'contrasena' => 'required|min:8',
            'fk_idEscolaridad' => 'required',
            'sector' => 'required',
            'fk_idSede' => 'required',
            'terminos' => 'required'


        ];
    }
}
