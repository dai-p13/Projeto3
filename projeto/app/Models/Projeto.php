<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projeto extends Model
{
    use HasFactory;

    protected $table = 'projeto';
    public $primaryKey = 'id_projeto';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'objetivos',
        'regulamento',
        'publicoAlvo',
        'observacoes'
    ];
}
