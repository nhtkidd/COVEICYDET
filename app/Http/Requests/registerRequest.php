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
            'name' => 'required|regex:/^[a-zA-Z]+$/u',
            'last_name' => 'required|regex:/^[a-zA-Z]+$/u',
            'curp' =>  'required|unique:users', //no te olivdes de poner de nuevos los unique
            'email' => 'required|max:50|email:rfc,dns|unique:users',
            'password' => 'required|min:8',
            'fk_idEducations' => 'required|exists:schoolings,idEducations',
            'sector' => 'required',
            'participation'=>'required|Boolean',
            'fk_idHeadquarters' => 'sometimes|required|exists:headquarters,idHeadquarters',
            'conditions' => 'required'
        ];
    }
}
