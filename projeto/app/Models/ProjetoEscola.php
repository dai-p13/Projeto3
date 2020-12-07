<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoEscola extends Model
{
    use HasFactory;

    protected $table = 'projeto_escola';
    //public $primaryKey = 'id_projeto';
    //public $primaryKey = 'id_escolaSolidaria';
    public $primaryKey = 'anoParticipacao';
    public $timestamps = false;

    protected $fillable = [
        'id_projeto',
        'id_escolaSolidaria'
    ];
}
