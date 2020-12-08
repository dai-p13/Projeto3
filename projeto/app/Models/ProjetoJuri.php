<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoJuri extends Model
{
    use HasFactory;

    protected $table = 'projeto_juri';
    //public $primaryKey = 'id_projeto';
    //public $primaryKey = 'id_juri';
    public $primaryKey = 'anoParticipacao';
    public $timestamps = false;

    protected $fillable = [
        'id_projeto',
        'id_juri'
    ];
}
