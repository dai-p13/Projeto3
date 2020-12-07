<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoUniversidade extends Model
{
    use HasFactory;

    protected $table = 'projeto_universidade';
    //public $primaryKey = 'id_projeto';
    //public $primaryKey = 'id_universidade';
    public $primaryKey = 'anoParticipacao';
    public $timestamps = false;

    protected $fillable = [
        'id_projeto',
        'id_universidade'
    ];
}
