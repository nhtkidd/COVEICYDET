<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class propuestaRequest extends FormRequest
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
     * 1,2,3,4,5 -> 9 caracteres
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'Required|max:100|regex:/^[^$%&|<>#]*$/',
            'objetive' => 'nullable|max:500|regex:/^[^$%&|<>#]*$/',
            'description' => 'nullable|max:2500|regex:/^[^$%&|<>#]*$/',
            'group' => 'nullable|max:2500|regex:/^[^$%&|<>#]*$/',
            'reach' => 'nullable|max:2500|regex:/^[^$%&|<>#]*$/',
            'finished' => 'nullable',
            'fk_idPlaces' => 'nullable|exists:places,name',
            'fk_idOds' => 'required|exists:ods,idOds|max:5',
            'fk_idUsers' => 'Required|exists:users,idUser',
            'area' => 'nullable|exists:areas,name',
            'fk_idAnnexe' => 'nullable|exists:annexes,idAnnexes'
        ];

    }
}
