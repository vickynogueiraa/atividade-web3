<?php

namespace App\Http\Controllers;

use App\Models\Prescricao;
use App\Models\Medico;
use App\Models\Paciente;
use App\Models\Medicamento;
use Illuminate\Http\Request;

class PrescricaoController extends Controller
{
    public function index()
    {
        $prescricoes = Prescricao::all();
        return view('prescricoes.index', compact('prescricoes'));
    }

    public function create()
    {
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        $medicamentos = Medicamento::all();
        return view('prescricoes.create', compact('medicos', 'pacientes', 'medicamentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'medicamento_id' => 'required|exists:medicamentos,id',
            'dosagem' => 'required|string|max:255',
            'frequencia' => 'required|string|max:255',
            'duracao' => 'required|string|max:255',
            'data_prescricao' => 'required|date',
        ]);

        Prescricao::create($request->all());

        return redirect()->route('prescricoes.index')->with('success', 'Prescrição criada com sucesso.');
    }

    public function show($id)
    {
        $prescricao = Prescricao::findOrFail($id);
        return view('prescricoes.show', compact('prescricao'));
    }

    public function edit($id)
    {
        $prescricao = Prescricao::findOrFail($id);
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        $medicamentos = Medicamento::all();
        return view('prescricoes.edit', compact('prescricao', 'medicos', 'pacientes', 'medicamentos'));
    }

    public function update(Request $request, $id)
    {
        $prescricao = Prescricao::findOrFail($id);

        $request->validate([
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'medicamento_id' => 'required|exists:medicamentos,id',
            'dosagem' => 'required|string|max:255',
            'frequencia' => 'required|string|max:255',
            'duracao' => 'required|string|max:255',
            'data_prescricao' => 'required|date',
        ]);

        $prescricao->update($request->all());

        return redirect()->route('prescricoes.index')->with('success', 'Prescrição atualizada com sucesso.');
    }

    public function destroy($id)
    {
        $prescricao = Prescricao::findOrFail($id);
        $prescricao->delete();

        return redirect()->route('prescricoes.index')->with('success', 'Prescrição removida com sucesso.');
    }
}
