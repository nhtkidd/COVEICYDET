<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Usuario extends Model
{
    use HasFactory;



    protected $fillable = ['nombre', 'apellidos', 'curp', 'correo', 'contrasena', 'sector','participacionPresencial', 'fk_idEscolaridad', 'fk_idSede', 'terminos'];

    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['contrasena'] = bcrypt($value);
    // }
}
