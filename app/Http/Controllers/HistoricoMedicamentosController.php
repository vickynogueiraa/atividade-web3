<?php

namespace App\Http\Controllers;

use App\Models\HistoricoMedicamento;
use App\Models\Paciente;
use App\Models\Medicamento;
use Illuminate\Http\Request;

class HistoricoMedicamentosController extends Controller
{
    public function index()
    {
        $historicoMedicamentos = HistoricoMedicamento::all();
        return view('historico_medicamentos.index', compact('historicoMedicamentos'));
    }

    public function create()
    {
        $pacientes = Paciente::all();
        $medicamentos = Medicamento::all();
        return view('historico_medicamentos.create', compact('pacientes', 'medicamentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medicamento_id' => 'required|exists:medicamentos,id',
            'quantidade' => 'required|integer|min:1',
            'data' => 'required|date',
        ]);

        HistoricoMedicamento::create($request->all());

        return redirect()->route('historico_medicamentos.index')->with('success', 'Histórico de medicamento cadastrado com sucesso.');
    }

    public function show($id)
    {
        $historicoMedicamento = HistoricoMedicamento::findOrFail($id);
        return view('historico_medicamentos.show', compact('historicoMedicamento'));
    }

    public function edit($id)
    {
        $historicoMedicamento = HistoricoMedicamento::findOrFail($id);
        $pacientes = Paciente::all();
        $medicamentos = Medicamento::all();
        return view('historico_medicamentos.edit', compact('historicoMedicamento', 'pacientes', 'medicamentos'));
    }

    public function update(Request $request, $id)
    {
        $historicoMedicamento = HistoricoMedicamento::findOrFail($id);

        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medicamento_id' => 'required|exists:medicamentos,id',
            'quantidade' => 'required|integer|min:1',
            'data' => 'required|date',
        ]);

        $historicoMedicamento->update($request->all());

        return redirect()->route('historico_medicamentos.index')->with('success', 'Histórico de medicamento atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $historicoMedicamento = HistoricoMedicamento::findOrFail($id);
        $historicoMedicamento->delete();

        return redirect()->route('historico_medicamentos.index')->with('success', 'Histórico de medicamento removido com sucesso.');
    }
}
