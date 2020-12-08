<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoRBE extends Model
{
    use HasFactory;

    protected $table = 'projeto_rbe';
    //public $primaryKey = 'id_projeto';
    //public $primaryKey = 'id_rbe';
    public $primaryKey = 'anoParticipacao';
    public $timestamps = false;

    protected $fillable = [
        'id_projeto',
        'id_rbe'
    ];
}
