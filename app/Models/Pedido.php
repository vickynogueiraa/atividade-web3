<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $table = 'pedidos';
    public $timestamps = false;
    protected $fillable = [
        'paciente_id',
        'medicamento_id',
        'quantidade',
        'farmacia_id',
        'status',
        'data',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function medicamento()
    {
        return $this->belongsTo(Medicamento::class, 'medicamento_id');
    }

    public function farmacia()
    {
        return $this->belongsTo(Farmacia::class, 'farmacia_id');
    }
}
