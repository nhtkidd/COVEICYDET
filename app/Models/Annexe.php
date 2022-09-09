<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annexe extends Model
{
    use HasFactory;

    protected $idAnnexes = 'idAnnexes'; 
    protected $fillable = [
        'problematic',
        'note',
        'areas'
    ];

    public $timestamps = false;
}
