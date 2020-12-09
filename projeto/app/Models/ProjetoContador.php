<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoContador extends Model
{
    use HasFactory;

    protected $table = 'projeto_contador';
    //public $primaryKey = 'id_projeto';
    //public $primaryKey = 'id_contador';
    public $primaryKey = 'anoParticipacao';
    public $timestamps = false;

    protected $fillable = [
        'id_projeto',
        'id_contador'
    ];
}