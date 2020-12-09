<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversidadeProfFaculdade extends Model
{
    use HasFactory;

    protected $table = 'universidade_prof_faculdade';
    public $primaryKey = ['id_universidade', 'id_professorFaculdade'];
    public $timestamps = false;

    protected $fillable = [
        'id_professorFaculdade',
        'id_universidade'
    ];
}
