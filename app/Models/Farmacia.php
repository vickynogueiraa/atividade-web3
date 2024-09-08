<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmacia extends Model
{
    use HasFactory;
    protected $table = 'farmacias';
    public $timestamps = false;
    protected $fillable = [
        'nome',
        'endereco',
        'telefone',
        'email',
        'horario_funcionamento',
        'tipo',
    ];

    public function medicamentoFarmacias()
    {
        return $this->hasMany(MedicamentoFarmacia::class, 'farmacia_id');
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'farmacia_id');
    }
}
