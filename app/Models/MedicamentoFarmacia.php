<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicamentoFarmacia extends Model
{
    use HasFactory;
    protected $table = 'medicamento_farmacia';
    public $timestamps = false;
    protected $fillable = [
        'medicamento_id',
        'farmacia_id',
        'preco',
        'estoque',
    ];

    public function medicamentoFarmacias()
    {
        return $this->hasMany(MedicamentoFarmacia::class, 'farmacia_id');
    }
}
