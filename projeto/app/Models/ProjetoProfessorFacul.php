<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoProfessorFacul extends Model
{
    use HasFactory;

    protected $table = 'projeto_prof_faculdade';
    //public $primaryKey = 'id_projeto';
    //public $primaryKey = 'id_professorFaculdade';
    public $primaryKey = 'anoParticipacao';
    public $timestamps = false;

    protected $fillable = [
        'id_projeto',
        'id_professorFaculdade'
    ];
}
