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
            'name' => 'required|max:50|regex:/^[a-zA-ZÑñáéíóúÁÉÍÓÚ\s]+$/',
            'last_name' => 'required|max:50|regex:/^[a-zA-ZÑñáéíóúÁÉÍÓÚ\s]+$/',
            'curp' =>  [
                'required',
                'regex:/^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/',
                'min:18',
                'max:18',
                'unique:users'
            ], //no te olivdes de poner de nuevos los unique
            'email' => [
                'required',
                'max:50',
                'email',
                'unique:users',
                'regex:/(.*)@(gmail|live|outlook|icloud|hotmail|yahoo)\.com/i'
            ],
            'password' => 'required|min:8',
            'fk_idEducations' => 'required|exists:schoolings,idEducations',
            'sector' => 'required',
            'participation' => 'required|boolean',
            'fk_idHeadquarters' => 'sometimes|required|exists:headquarters,idHeadquarters',
            'conditions' => 'required'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'participation' => $this->toBoolean($this->participation),
        ]);
    }

    private function toBoolean($booleable)
    {
        return filter_var($booleable, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    }
}
