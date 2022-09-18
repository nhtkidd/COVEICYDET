<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Proposal extends Model
{
    use HasFactory;
    protected $primaryKey = 'idProposal'; 
    protected $fkidUser = 'fk_idUsers'; 

    protected $fillable = [
        'name',
        'objetive',
        'description',
        'group',
        'reach',
        'finished',
        'fk_idPlaces',
        'fk_idOds',
        'fk_idUsers',
        'area',
        'fk_idAnnexe'
    ];

    public $timestamps = false;

    
}
