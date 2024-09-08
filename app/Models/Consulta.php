<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;
    protected $table = 'consultas';
    public $timestamps = false;
    protected $fillable = [
        'medico_id',
        'paciente_id',
        'data',
        'descricao',
    ];

    protected $casts = [
        'data' => 'datetime:Y-m-d H:i:s',
    ];

    public function medico()
    {
        return $this->belongsTo(Medico::class, 'medico_id');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }
}
