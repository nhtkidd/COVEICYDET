<?php

namespace App\Http\Requests;

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
            'name' => 'Required|max:200',
            'objetive' => 'Required|max:500',
            'description' => 'Required|max:2500',
            'group' => 'Required|max:2500',
            'reach' => 'Required|max:2500',
            'finished' => 'Required',
            'fk_idPlaces' => 'Required',
            'fk_idOds' => 'Required|max:9',
            'fk_idUsers' => 'Required',
            'area' => 'Required',
            'fk_idAnnexe' => 'Required'
        ];

    }
}
