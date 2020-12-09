<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $table = 'professor';
    public $primaryKey = 'id_professor';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'telefone',
        'telemovel',
        'email',
        'id_agrupamento'
    ];
}