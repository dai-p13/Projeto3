<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoEscola extends Model
{
    use HasFactory;

    protected $table = 'projeto_escola';
    public $primaryKey = ['anoParticipacao', 'id_projeto', 'id_escolaSolidaria'];
    public $timestamps = false;

    protected $fillable = [
        'id_projeto',
        'id_escolaSolidaria',
        'anoParticipacao'
    ];

    public function projeto() {
        $this->hasOne("'App\Models\Projeto'");
    }

    public function escola() {
        $this->hasOne("'App\Models\EscolaSolidaria'");
    }
}
