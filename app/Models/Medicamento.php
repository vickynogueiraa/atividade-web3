<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicamento extends Model
{
    use HasFactory;
    protected $table = 'medicamentos';
    public $timestamps = false;
    protected $fillable = [
        'nome',
        'dosagem',
        'descricao',
    ];

    public function prescricoes()
    {
        return $this->hasMany(Prescricao::class, 'medicamento_id');
    }

    public function medicamentoFarmacias()
    {
        return $this->hasMany(MedicamentoFarmacia::class, 'medicamento_id');
    }

    public function historicoMedicamentos()
    {
        return $this->hasMany(HistoricoMedicamento::class, 'medicamento_id');
    }
}
