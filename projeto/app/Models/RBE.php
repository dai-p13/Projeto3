<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RBE extends Model
{
    use HasFactory;

    protected $table = 'rbe';
    public $primaryKey = 'id_rbe';
    public $timestamps = false;

    protected $fillable = [
        'regiao',
        'nomeCoordenador',
        'id_concelho'
    ];

    public function projetos() {
        $this->hasMany("'App\Models\ProjetoRBE'");
    }

    public function concelho() {
        $this->hasOne("'App\Models\Concelho'");
    }
}
