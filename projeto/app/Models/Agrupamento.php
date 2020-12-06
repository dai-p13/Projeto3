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
}
