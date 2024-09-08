<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoMedicamento extends Model
{
    use HasFactory;
    protected $table = 'historico_medicamentos';
    public $timestamps = false;
    protected $fillable = [
        'paciente_id',
        'medicamento_id',
        'quantidade',
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
}
