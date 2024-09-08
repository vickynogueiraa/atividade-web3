<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ProntuarioController;
use App\Http\Controllers\ExameController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\PrescricaoController;
use App\Http\Controllers\FarmaciaController;
use App\Http\Controllers\MedicamentoFarmaciaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\HistoricoMedicamentosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Médicos
    Route::get('medicos', [MedicoController::class, 'index'])->name('medicos.index');
    Route::get('medicos/create', [MedicoController::class, 'create'])->name('medicos.create');
    Route::post('medicos', [MedicoController::class, 'store'])->name('medicos.store');
    Route::get('medicos/{id}', [MedicoController::class, 'show'])->name('medicos.show');
    Route::get('medicos/{id}/edit', [MedicoController::class, 'edit'])->name('medicos.edit');
    Route::put('medicos/{id}', [MedicoController::class, 'update'])->name('medicos.update');
    Route::delete('medicos/{id}', [MedicoController::class, 'destroy'])->name('medicos.destroy');

    //Pacientes
    Route::get('pacientes', [PacienteController::class, 'index'])->name('pacientes.index');
    Route::get('pacientes/create', [PacienteController::class, 'create'])->name('pacientes.create');
    Route::post('pacientes', [PacienteController::class, 'store'])->name('pacientes.store');
    Route::get('pacientes/{id}', [PacienteController::class, 'show'])->name('pacientes.show');
    Route::get('pacientes/{id}/edit', [PacienteController::class, 'edit'])->name('pacientes.edit');
    Route::put('pacientes/{id}', [PacienteController::class, 'update'])->name('pacientes.update');
    Route::delete('pacientes/{id}', [PacienteController::class, 'destroy'])->name('pacientes.destroy');

    //Consultas
    Route::get('consultas', [ConsultaController::class, 'index'])->name('consultas.index');
    Route::get('consultas/create', [ConsultaController::class, 'create'])->name('consultas.create');
    Route::post('consultas', [ConsultaController::class, 'store'])->name('consultas.store');
    Route::get('consultas/{id}', [ConsultaController::class, 'show'])->name('consultas.show');
    Route::get('consultas/{id}/edit', [ConsultaController::class, 'edit'])->name('consultas.edit');
    Route::put('consultas/{id}', [ConsultaController::class, 'update'])->name('consultas.update');
    Route::delete('consultas/{id}', [ConsultaController::class, 'destroy'])->name('consultas.destroy');

    //Prontuários
    Route::get('prontuarios', [ProntuarioController::class, 'index'])->name('prontuarios.index');
    Route::get('prontuarios/create', [ProntuarioController::class, 'create'])->name('prontuarios.create');
    Route::post('prontuarios', [ProntuarioController::class, 'store'])->name('prontuarios.store');
    Route::get('prontuarios/{id}', [ProntuarioController::class, 'show'])->name('prontuarios.show');
    Route::get('prontuarios/{id}/edit', [ProntuarioController::class, 'edit'])->name('prontuarios.edit');
    Route::put('prontuarios/{id}', [ProntuarioController::class, 'update'])->name('prontuarios.update');
    Route::delete('prontuarios/{id}', [ProntuarioController::class, 'destroy'])->name('prontuarios.destroy');

    //Exames
    Route::get('exames', [ExameController::class, 'index'])->name('exames.index');
    Route::get('exames/create', [ExameController::class, 'create'])->name('exames.create');
    Route::post('exames', [ExameController::class, 'store'])->name('exames.store');
    Route::get('exames/{id}', [ExameController::class, 'show'])->name('exames.show');
    Route::get('exames/{id}/edit', [ExameController::class, 'edit'])->name('exames.edit');
    Route::put('exames/{id}', [ExameController::class, 'update'])->name('exames.update');
    Route::delete('exames/{id}', [ExameController::class, 'destroy'])->name('exames.destroy');

    //Resultado de Exames
    Route::get('resultados', [ResultadoExameController::class, 'index'])->name('resultados.index');
    Route::get('resultados/create', [ResultadoExameController::class, 'create'])->name('resultados.create');
    Route::post('resultados', [ResultadoExameController::class, 'store'])->name('resultados.store');
    Route::get('resultados/{id}', [ResultadoExameController::class, 'show'])->name('resultados.show');
    Route::get('resultados/{id}/edit', [ResultadoExameController::class, 'edit'])->name('resultados.edit');
    Route::put('resultados/{id}', [ResultadoExameController::class, 'update'])->name('resultados.update');
    Route::delete('resultados/{id}', [ResultadoExameController::class, 'destroy'])->name('resultados.destroy');

    //Medicamentos
    Route::get('medicamentos', [MedicamentoController::class, 'index'])->name('medicamentos.index');
    Route::get('medicamentos/create', [MedicamentoController::class, 'create'])->name('medicamentos.create');
    Route::post('medicamentos', [MedicamentoController::class, 'store'])->name('medicamentos.store');
    Route::get('medicamentos/{id}', [MedicamentoController::class, 'show'])->name('medicamentos.show');
    Route::get('medicamentos/{id}/edit', [MedicamentoController::class, 'edit'])->name('medicamentos.edit');
    Route::put('medicamentos/{id}', [MedicamentoController::class, 'update'])->name('medicamentos.update');
    Route::delete('medicamentos/{id}', [MedicamentoController::class, 'destroy'])->name('medicamentos.destroy');

    //Prescrições
    Route::get('prescricoes', [PrescricaoController::class, 'index'])->name('prescricoes.index');
    Route::get('prescricoes/create', [PrescricaoController::class, 'create'])->name('prescricoes.create');
    Route::post('prescricoes', [PrescricaoController::class, 'store'])->name('prescricoes.store');
    Route::get('prescricoes/{id}', [PrescricaoController::class, 'show'])->name('prescricoes.show');
    Route::get('prescricoes/{id}/edit', [PrescricaoController::class, 'edit'])->name('prescricoes.edit');
    Route::put('prescricoes/{id}', [PrescricaoController::class, 'update'])->name('prescricoes.update');
    Route::delete('prescricoes/{id}', [PrescricaoController::class, 'destroy'])->name('prescricoes.destroy');

    //Farmácias
    Route::get('farmacias', [FarmaciaController::class, 'index'])->name('farmacias.index');
    Route::get('farmacias/create', [FarmaciaController::class, 'create'])->name('farmacias.create');
    Route::post('farmacias', [FarmaciaController::class, 'store'])->name('farmacias.store');
    Route::get('farmacias/{id}', [FarmaciaController::class, 'show'])->name('farmacias.show');
    Route::get('farmacias/{id}/edit', [FarmaciaController::class, 'edit'])->name('farmacias.edit');
    Route::put('farmacias/{id}', [FarmaciaController::class, 'update'])->name('farmacias.update');
    Route::delete('farmacias/{id}', [FarmaciaController::class, 'destroy'])->name('farmacias.destroy');

    //Medicamentos na Farmácia
    Route::get('/medicamentos_farmacia', [MedicamentoFarmaciaController::class, 'index'])->name('medicamentos_farmacia.index');
    Route::get('/medicamentos_farmacia/create', [MedicamentoFarmaciaController::class, 'create'])->name('medicamentos_farmacia.create');
    Route::post('/medicamentos_farmacia', [MedicamentoFarmaciaController::class, 'store'])->name('medicamentos_farmacia.store');
    Route::get('/medicamentos_farmacia/{id}', [MedicamentoFarmaciaController::class, 'show'])->name('medicamentos_farmacia.show');
    Route::get('/medicamentos_farmacia/{id}/edit', [MedicamentoFarmaciaController::class, 'edit'])->name('medicamentos_farmacia.edit');
    Route::put('/medicamentos_farmacia/{id}', [MedicamentoFarmaciaController::class, 'update'])->name('medicamentos_farmacia.update');
    Route::delete('/medicamentos_farmacia/{id}', [MedicamentoFarmaciaController::class, 'destroy'])->name('medicamentos_farmacia.destroy');
    

    //Pedidos
    Route::get('pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
    Route::get('pedidos/create', [PedidoController::class, 'create'])->name('pedidos.create');
    Route::post('pedidos', [PedidoController::class, 'store'])->name('pedidos.store');
    Route::get('pedidos/{id}', [PedidoController::class, 'show'])->name('pedidos.show');
    Route::get('pedidos/{id}/edit', [PedidoController::class, 'edit'])->name('pedidos.edit');
    Route::put('pedidos/{id}', [PedidoController::class, 'update'])->name('pedidos.update');
    Route::delete('pedidos/{id}', [PedidoController::class, 'destroy'])->name('pedidos.destroy');

    //Histórico de Medicamentos
    Route::get('historico_medicamentos', [HistoricoMedicamentosController::class, 'index'])->name('historico_medicamentos.index');
    Route::get('historico_medicamentos/create', [HistoricoMedicamentosController::class, 'create'])->name('historico_medicamentos.create');
    Route::post('historico_medicamentos', [HistoricoMedicamentosController::class, 'store'])->name('historico_medicamentos.store');
    Route::get('historico_medicamentos/{id}', [HistoricoMedicamentosController::class, 'show'])->name('historico_medicamentos.show');
    Route::get('historico_medicamentos/{id}/edit', [HistoricoMedicamentosController::class, 'edit'])->name('historico_medicamentos.edit');
    Route::put('historico_medicamentos/{id}', [HistoricoMedicamentosController::class, 'update'])->name('historico_medicamentos.update');
    Route::delete('historico_medicamentos/{id}', [HistoricoMedicamentosController::class, 'destroy'])->name('historico_medicamentos.destroy');
});

require __DIR__.'/auth.php';

