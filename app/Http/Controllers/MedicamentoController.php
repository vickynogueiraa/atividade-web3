<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    public function index()
    {
        $medicamentos = Medicamento::all();
        return view('medicamentos.index', compact('medicamentos'));
    }

    public function create()
    {
        return view('medicamentos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'dosagem' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        Medicamento::create($request->all());

        return redirect()->route('medicamentos.index')->with('success', 'Medicamento criado com sucesso.');
    }

    public function show($id)
    {
        $medicamento = Medicamento::findOrFail($id);
        return view('medicamentos.show', compact('medicamento'));
    }

    public function edit($id)
    {
        $medicamento = Medicamento::findOrFail($id);
        return view('medicamentos.edit', compact('medicamento'));
    }

    public function update(Request $request, $id)
    {
        $medicamento = Medicamento::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255',
            'dosagem' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        $medicamento->update($request->all());

        return redirect()->route('medicamentos.index')->with('success', 'Medicamento atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $medicamento = Medicamento::findOrFail($id);
        $medicamento->delete();

        return redirect()->route('medicamentos.index')->with('success', 'Medicamento removido com sucesso.');
    }
}
