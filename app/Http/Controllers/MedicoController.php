<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function index()
    {
        $medicos = Medico::all();
        return view('medicos.index', compact('medicos'));
    }

    public function create()
    {
        return view('medicos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_medico' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:medicos',
            'crm' => 'required|string|max:20|unique:medicos',
            'especialidade' => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:medicos',
            'endereco' => 'required|string|max:255',
        ]);

        Medico::create($request->all());

        return redirect()->route('medicos.index')->with('success', 'Médico cadastrado com sucesso.');
    }

    public function show($id)
    {
        $medico = Medico::findOrFail($id);
        return view('medicos.show', compact('medico'));
    }

    public function edit($id)
    {
        $medico = Medico::findOrFail($id);
        return view('medicos.edit', compact('medico'));
    }

    public function update(Request $request, $id)
    {
        $medico = Medico::findOrFail($id);

        $request->validate([
            'nome_medico' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:medicos,cpf,' . $id,
            'crm' => 'required|string|max:20|unique:medicos,crm,' . $id,
            'especialidade' => 'required|string|max:255',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:medicos,email,' . $id,
            'endereco' => 'required|string|max:255',
        ]);

        $medico->update($request->all());

        return redirect()->route('medicos.index')->with('success', 'Dados atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $medico = Medico::findOrFail($id);
        $medico->delete();

        return redirect()->route('medicos.index')->with('success', 'Médico removido com sucesso.');
    }
}
