<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;

    protected $table = 'projeto';
    public $primaryKey = 'id_projeto';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'objetivos',
        'regulamento',
        'publicoAlvo',
        'observacoes'
    ];

    public function utilizadores() {
        $this->hasMany("'App\Models\Utilizador'");
    }

    public function ilustradores() {
        $this->hasMany("'App\Models\ProjetoIlustrador'");
    }

    public function juris() {
        $this->hasMany("'App\Models\ProjetoJuri'");
    }

    public function professores() {
        $this->hasMany("'App\Models\ProjetoProfessor'");
    }

    public function professoresFacul() {
        $this->hasMany("'App\Models\ProjetoProfessorFacul'");
    }

}
