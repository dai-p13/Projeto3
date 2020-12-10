<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Universidade extends Model
{
    use HasFactory;

    protected $table = 'universidade';
    public $primaryKey = 'id_universidade';
    public $timestamps = false;

    protected $fillable = [
        'curso',
        'tipo',
        'nome',
        'telefone',
        'telemovel',
        'email'
    ];

    public function projetos() {
        $this->hasMany("'App\Models\ProjetoUniversidade'");
    }

    public function professores() {
        $this->hasMany("'App\Models\UniversidadeProfFaculdade'");
    }
}
