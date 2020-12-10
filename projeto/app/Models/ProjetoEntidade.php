<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoEntidade extends Model
{
    use HasFactory;

    protected $table = 'projeto_entidade';
    public $primaryKey = ['anoParticipacao', 'id_projeto', 'id_entidadeOficial'];
    public $timestamps = false;

    protected $fillable = [
        'id_projeto',
        'id_entidadeOficial',
        'anoParticipacao'
    ];

    public function projeto() {
        $this->hasOne("'App\Models\Projeto'");
    }

    public function entidadeOficial() {
        $this->hasOne("'App\Models\EntidadeOficial'");
    }
}
