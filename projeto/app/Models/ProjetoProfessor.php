<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoProfessor extends Model
{
    use HasFactory;

    protected $table = 'projeto_professor';
    public $primaryKey = ['anoParticipacao', 'id_projeto', 'id_professor'];
    public $timestamps = false;

    protected $fillable = [
        'id_projeto',
        'id_professor',
        'anoParticipacao',
        'id_cargo'
    ];

    public function projeto() {
        $this->hasOne("'App\Models\Projeto'");
    }

    public function professor() {
        $this->hasOne("'App\Models\Professor'");
    }

    public function cargo() {
        $this->hasOne("'App\Models\CargoProf'");
    }
}
