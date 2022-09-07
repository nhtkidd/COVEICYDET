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
        // return[];
        return [
            'name' => 'required',
            'last_name' => 'required',
            'curp' =>  'required|unique:users', //no te olivdes de poner de nuevos los unique
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
             'fk_idEducations' => 'required',
            'sector' => 'required',
            'participation'=>'required',
            'fk_idHeadquarters' => 'sometimes|required',
            'conditions' => 'required'
        ];
    }
}
