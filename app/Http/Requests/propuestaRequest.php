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
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'Required',
            'objetive' => 'Required',
            'description' => 'Required',
            'group' => 'Required',
            'reach' => 'Required',
            'finished' => 'Required',
            'fk_idPlaces' => 'Required',
            'fk_idOds' => 'Required|max:5',
            'fk_idUsers' => 'Required'
        ];
    }
}
