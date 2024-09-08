<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prontuario extends Model
{
    use HasFactory;
    protected $table = 'prontuarios';
    public $timestamps = false;
    protected $fillable = [
        'paciente_id',
        'arquivos',
    ];

    protected $casts = [
        'arquivos' => 'array',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }

    public function registros()
    {
        return $this->hasMany(Registro::class, 'prontuario_id');
    }

    public function resultadosExames()
    {
        return $this->hasMany(ResultadoExame::class, 'prontuario_id');
    }

    public function compartilhamentos()
    {
        return $this->hasMany(Compartilhamento::class, 'prontuario_id');
    }

}
