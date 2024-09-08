<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ConsultaController extends Controller
{
    public function index()
    {
        $consultas = Consulta::with('medico', 'paciente')->get();
        return view('consultas.index', compact('consultas'));
    }

    public function create()
    {
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        return view('consultas.create', compact('medicos', 'pacientes'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'data' => 'required|date_format:Y-m-d\TH:i',
            'descricao' => 'nullable|string|max:255',
        ]);

     
        $consultaData = Carbon::createFromFormat('Y-m-d\TH:i', $request->data);

       
        Consulta::create([
            'medico_id' => $request->medico_id,
            'paciente_id' => $request->paciente_id,
            'data' => $consultaData->format('Y-m-d H:i:s'), 
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('consultas.index')->with('success', 'Consulta agendada com sucesso.');
    }

    public function show($id)
    {
        $consulta = Consulta::with('medico', 'paciente')->findOrFail($id);
        return view('consultas.show', compact('consulta'));
    }

    public function edit($id)
    {
        $consulta = Consulta::findOrFail($id);
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        return view('consultas.edit', compact('consulta', 'medicos', 'pacientes'));
    }

    public function update(Request $request, $id)
    {
        $consulta = Consulta::findOrFail($id);

       
        $request->validate([
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'data' => 'required|date_format:Y-m-d\TH:i',
            'descricao' => 'nullable|string|max:255',
        ]);

        // Converte o formato da data para 'Y-m-d H:i:s'
        $consultaData = Carbon::createFromFormat('Y-m-d\TH:i', $request->data);

        // Atualiza os dados da consulta com a data ajustada
        $consulta->update([
            'medico_id' => $request->medico_id,
            'paciente_id' => $request->paciente_id,
            'data' => $consultaData->format('Y-m-d H:i:s'),
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('consultas.index')->with('success', 'Consulta atualizada com sucesso.');
    }

    public function destroy($id)
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->delete();

        return redirect()->route('consultas.index')->with('success', 'Consulta removida com sucesso.');
    }
}
