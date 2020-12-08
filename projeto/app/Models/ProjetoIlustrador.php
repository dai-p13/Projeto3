<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoIlustrador extends Model
{
    use HasFactory;

    protected $table = 'projeto_ilustrador';
    //public $primaryKey = 'id_projeto';
    //public $primaryKey = 'id_ilustradorSolidario';
    public $primaryKey = 'anoParticipacao';
    public $timestamps = false;

    protected $fillable = [
        'id_projeto',
        'id_ilustradorSolidario'
    ];
}
