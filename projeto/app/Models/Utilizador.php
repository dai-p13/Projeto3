<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilizador extends Model
{
    use HasFactory;

    protected $table = 'utilizador';
    public $primaryKey = 'id_utilizador';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'telemovel',
        'telefone',
        'email',
        'tipoUtilizador',
        'departamento'
    ];


    
    /*
    public function projetos()
    {
        return $this->hasMany('App\Models\Utilizador_Projeto');
    }*/
}