<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $table = 'pacientes';
    public $timestamps = false;
    protected $fillable = [
        'nome_completo',
        'cpf',
        'data_nascimento',
        'telefone',
        'email',
        'endereco',
    ];

    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'paciente_id');
    }

    public function prescricoes()
    {
        return $this->hasMany(Prescricao::class, 'paciente_id');
    }

    public function historicoMedicamentos()
    {
        return $this->hasMany(HistoricoMedicamento::class, 'paciente_id');
    }

    public function pedidos()
    {
        return $this->hasMany(Pedido::class, 'paciente_id');
    }

    public function prontuarios()
    {
        return $this->hasMany(Prontuario::class, 'paciente_id');
    }
}
