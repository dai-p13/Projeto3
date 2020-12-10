<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoProfessorFacul extends Model
{
    use HasFactory;

    protected $table = 'projeto_prof_faculdade';
    public $primaryKey = ['anoParticipacao', 'id_professorFaculdade', 'id_projeto'];
    public $timestamps = false;

    protected $fillable = [
        'id_projeto',
        'id_professorFaculdade'
    ];

    public function projeto() {
        $this->hasOne("'App\Models\Projeto'");
    }

    public function professorFacul() {
        $this->hasOne("'App\Models\ProfessorFaculdade'");
    }
}
