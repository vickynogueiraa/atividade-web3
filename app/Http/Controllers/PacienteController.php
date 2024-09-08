<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::all();
        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_completo' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:pacientes',
            'data_nascimento' => 'required|date',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:pacientes',
            'endereco' => 'required|string|max:255',
        ]);

        Paciente::create($request->all());

        return redirect()->route('pacientes.index')->with('success', 'Paciente cadastrado com sucesso.');
    }

    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.show', compact('paciente'));
    }

    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, $id)
    {
        $paciente = Paciente::findOrFail($id);

        $request->validate([
            'nome_completo' => 'required|string|max:255',
            'cpf' => 'required|string|max:14|unique:pacientes,cpf,' . $id,
            'data_nascimento' => 'required|date',
            'telefone' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:pacientes,email,' . $id,
            'endereco' => 'required|string|max:255',
        ]);

        $paciente->update($request->all());

        return redirect()->route('pacientes.index')->with('success', 'Paciente atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->delete();

        return redirect()->route('pacientes.index')->with('success', 'Paciente removido com sucesso.');
    }
}
