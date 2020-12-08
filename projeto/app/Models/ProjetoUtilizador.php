<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetoUtilizador extends Model
{
    use HasFactory;

    protected $table = 'projeto_utilizador';
    //public $primaryKey = 'id_projeto';
    public $primaryKey = 'id_utilizador';
    public $timestamps = false;

    protected $fillable = [
        'id_projeto'
    ];
}
