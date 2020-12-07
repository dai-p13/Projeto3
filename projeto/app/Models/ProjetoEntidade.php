<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoEntidade extends Model
{
    use HasFactory;

    protected $table = 'projeto_entidade';
    //public $primaryKey = 'id_projeto';
    //public $primaryKey = 'id_entidade';
    public $primaryKey = 'anoParticipacao';
    public $timestamps = false;

    protected $fillable = [
        'id_projeto',
        'id_entidadeOficial'
    ];
}
