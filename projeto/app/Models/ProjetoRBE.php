<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoRBE extends Model
{
    use HasFactory;

    protected $table = 'projeto_rbe';
    public $primaryKey = ['anoParticipacao', 'id_projeto', 'id_rbe'];
    public $timestamps = false;

    protected $fillable = [
        'id_projeto',
        'id_rbe',
        'anoParticipacao'
    ];

    public function projeto() {
        $this->hasOne("'App\Models\Projeto'");
    }

    public function rbe() {
        $this->hasOne("'App\Models\RBE'");
    }
}
