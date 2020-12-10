<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodPostalRua extends Model
{
    use HasFactory;

    protected $table = 'cod_postal_rua';
    public $primaryKey = ['codPostal', 'codPostalRua'];
    public $timestamps = false;

    protected $fillable = [
        'codPostal',
        'codPostalRua',
        'rua',
        'numPorta'
    ];

    public function codPostal() {
        $this->hasOne("'App\Models\CodPostal'");
    }
}
