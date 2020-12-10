<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agrupamento extends Model
{
    use HasFactory;

    protected $table = 'agrupamento';
    public $primaryKey = 'id_agrupamento';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'nomeDiretor'
    ];

    public function codPostal() {
        $this->hasOne("'App\Models\CodPostal'", 'codPostal', 'id_agrupamento');
    }

    public function escolas() {
        $this->hasMany("'App\Models\EscolaSolidaria'");
    }

    public function professores() {
        $this->hasMany("'App\Models\Professor'");
    }
}
