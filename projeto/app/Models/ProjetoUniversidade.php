<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoUniversidade extends Model
{
    use HasFactory;

    protected $table = 'projeto_universidade';
    public $primaryKey = ['anoParticipacao', 'id_projeto', 'id_universidade'];
    public $timestamps = false;

    protected $fillable = [
        'id_projeto',
        'id_universidade',
        'anoParticipacao'
    ];

    public function projeto() {
        $this->hasOne("'App\Models\Projeto'");
    }

    public function universidade() {
        $this->hasOne("'App\Models\Universidade'");
    }
}
