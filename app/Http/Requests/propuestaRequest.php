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
            'name' => 'Required|max:100|regex:/^[a-zA-ZÑñáéíóúÁÉÍÓÚ\s]+$/',
            'objetive' => 'nullable|max:500|regex:/^[a-zA-ZÑñáéíóúÁÉÍÓÚ\s]+$/',
            'description' => 'nullable|max:2500|regex:/^[a-zA-ZÑñáéíóúÁÉÍÓÚ\s]+$/',
            'group' => 'nullable|max:2500|regex:/^[a-zA-ZÑñáéíóúÁÉÍÓÚ\s]+$/',
            'reach' => 'nullable|max:2500|regex:/^[a-zA-ZÑñáéíóúÁÉÍÓÚ\s]+$/',
            'finished' => 'nullable',
            'fk_idPlaces' => 'nullable|exists:places,name',
            'fk_idOds' => 'required|max:9',
            'fk_idUsers' => 'Required|exists:users,idUser,' .auth()->user()->idUser,
            'area' => 'nullable',
            'fk_idAnnexe' => 'nullable'
        ];

    }
}
