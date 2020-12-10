<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $table = 'professor';
    public $primaryKey = 'id_professor';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'telefone',
        'telemovel',
        'email',
        'id_agrupamento'
    ];

    public function projetos() {
        $this->hasMany("'App\Models\ProjetoProfessor'");
    }

    public function escolas() {
        $this->hasMany("'App\Models\EscolaSolidariaProf'");
    }
    
    public function trocasAgrupamento() {
        $this->hasMany("'App\Models\TrocaAgrupamento'");
    }

    public function agrupamento() {
        $this->hasOne("'App\Models\Agrupamento'");
    }

    
}
