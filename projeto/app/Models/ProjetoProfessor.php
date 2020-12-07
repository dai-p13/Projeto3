<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoProfessor extends Model
{
    use HasFactory;

    protected $table = 'projeto_professor';
    //public $primaryKey = 'id_projeto';
    //public $primaryKey = 'id_professor';
    public $primaryKey = 'anoParticipacao';
    public $timestamps = false;

    protected $fillable = [
        'id_projeto',
        'id_professor',
        'id_cargo'
    ];
}
