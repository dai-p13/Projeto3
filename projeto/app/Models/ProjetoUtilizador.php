<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoUtilizador extends Model
{
    use HasFactory;

    protected $table = 'projeto_utilizador';
    public $primaryKey = ['id_utilizador', 'id_projeto'];
    public $timestamps = false;

    protected $fillable = [
        'id_projeto',
        'id_utilizador'
    ];

    public function utilizador() {
        $this->hasOne("'App\Models\Utilizador'");
    }

    public function projeto() {
        $this->hasOne("'App\Models\Projeto'");
    }
}
