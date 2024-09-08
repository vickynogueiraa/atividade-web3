<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;
    protected $table = 'medicos';
    public $timestamps = false;
    protected $fillable = [
        'nome_medico',
        'cpf',
        'crm',
        'especialidade',
        'telefone',
        'email',
        'endereco',
    ];

    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'medico_id');
    }

    public function prescricoes()
    {
        return $this->hasMany(Prescricao::class, 'medico_id');
    }
}
