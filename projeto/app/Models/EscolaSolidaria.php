<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EscolaSolidaria extends Model
{
    use HasFactory;

    protected $table = 'escola_solidaria';
    public $primaryKey = 'id_escolaSolidaria';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'telefone',
        'telemovel',
        'contactoAssPais',
        'id_agrupamento'
    ];
}
