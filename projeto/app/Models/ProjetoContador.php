<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoContador extends Model
{
    use HasFactory;

    protected $table = 'projeto_contador';
    public $primaryKey = ['anoParticipacao', 'id_projeto', 'id_contador'];
    public $timestamps = false;

    protected $fillable = [
        'id_projeto',
        'id_contador',
        'anoParticipacao'
    ];

    public function projeto() {
        $this->hasOne("'App\Models\Projeto'");
    }

    public function contador() {
        $this->hasOne("'App\Models\ContadorHistorias'");
    }
}
