<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodPostalRua extends Model
{
    use HasFactory;

    protected $table = 'cod_postal_rua';
    public $primaryKey = 'codPostal';
    public $timestamps = false;

    protected $fillable = [
        'codPostal',
        'rua',
        'numPorta'
        
    ];
}
