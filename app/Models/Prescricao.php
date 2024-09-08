<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescricao extends Model
{
    use HasFactory;
    protected $table = 'prescricoes';
    public $timestamps = false;
    protected $fillable = [
        'medico_id',
        'paciente_id',
        'medicamento_id',
        'dosagem',
        'frequencia',
        'duracao',
        'data_prescricao',
    ];

    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function medicamento()
    {
        return $this->belongsTo(Medicamento::class, 'medicamento_id');
    }
}

