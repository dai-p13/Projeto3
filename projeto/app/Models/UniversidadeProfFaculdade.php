<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversidadeProfFaculdade extends Model
{
    use HasFactory;

    protected $table = 'universidade_prof_faculdade';
    //public $primaryKey = 'id_professorFaculdade';
    public $primaryKey = 'id_universidade';
    public $timestamps = false;

    protected $fillable = [
        'id_professorFaculdade'
    ];
}
