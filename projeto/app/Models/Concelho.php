<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Concelho extends Model
{
    use HasFactory;

    protected $table = 'concelho';
    public $primaryKey = 'id_concelho';
    public $timestamps = false;

    protected $fillable = [
        'nome',
    ];

    public function rbes() {
        $this->hasMany("'App\Models\RBE'");
    }
}
