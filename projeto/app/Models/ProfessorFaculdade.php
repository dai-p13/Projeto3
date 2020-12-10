<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfessorFaculdade extends Model
{
    use HasFactory;

    protected $table = 'professor_faculdade';
    public $primaryKey = 'id_professorFaculdade';
    public $timestamps = false;

    protected $fillable = [
        'cargo',
        'nome',
        'telefone',
        'telemovel',
        'email',
        'observacoes'
    ];

    public function projetos() {
        $this->hasMany("'App\Models\ProjetoProfessorFacul'");
    }

    public function universidades() {
        $this->hasMany("'App\Models\Universidade'");
    }
}
