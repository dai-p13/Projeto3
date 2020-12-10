<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoJuri extends Model
{
    use HasFactory;

    protected $table = 'projeto_juri';
    public $primaryKey = ['anoParticipacao', 'id_projeto', 'id_juri'];
    public $timestamps = false;

    protected $fillable = [
        'id_projeto',
        'id_juri',
        'anoParticipacao'
    ];

    public function projeto() {
        $this->hasOne("'App\Models\Projeto'");
    }

    public function juri() {
        $this->hasOne("'App\Models\Juri'");
    }
}
