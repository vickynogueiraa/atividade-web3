<?php

namespace App\Http\Controllers;

use App\Models\MedicamentoFarmacia;
use App\Models\Medicamento;
use App\Models\Farmacia;
use Illuminate\Http\Request;

class MedicamentoFarmaciaController extends Controller
{
    public function index()
    {
        $medicamentosFarmacia = MedicamentoFarmacia::with(['medicamento', 'farmacia'])->get();
        return view('medicamentos_farmacia.index', compact('medicamentosFarmacia'));
    }

    public function create()
    {
        $medicamentos = Medicamento::all();
        $farmacias = Farmacia::all();
        return view('medicamentos_farmacia.create', compact('medicamentos', 'farmacias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'medicamento_id' => 'required|exists:medicamentos,id',
            'farmacia_id' => 'required|exists:farmacias,id',
            'preco' => 'required|numeric|min:0',
            'estoque' => 'required|integer|min:0',
        ]);

        MedicamentoFarmacia::create($request->all());

        return redirect()->route('medicamentos_farmacia.index')->with('success', 'Medicamento na farmácia cadastrado com sucesso.');
    }

    public function show($id)
    {
        $medicamentoFarmacia = MedicamentoFarmacia::with(['medicamento', 'farmacia'])->findOrFail($id);
        return view('medicamentos_farmacia.show', compact('medicamentoFarmacia'));
    }

    public function edit($id)
    {
        $medicamentoFarmacia = MedicamentoFarmacia::findOrFail($id);
        $medicamentos = Medicamento::all();
        $farmacias = Farmacia::all();
        return view('medicamentos_farmacia.edit', compact('medicamentoFarmacia', 'medicamentos', 'farmacias'));
    }

    public function update(Request $request, $id)
    {
        $medicamentoFarmacia = MedicamentoFarmacia::findOrFail($id);

        $request->validate([
            'medicamento_id' => 'required|exists:medicamentos,id',
            'farmacia_id' => 'required|exists:farmacias,id',
            'preco' => 'required|numeric|min:0',
            'estoque' => 'required|integer|min:0',
        ]);

        $medicamentoFarmacia->update($request->all());

        return redirect()->route('medicamentos_farmacia.index')->with('success', 'Medicamento na farmácia atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $medicamentoFarmacia = MedicamentoFarmacia::findOrFail($id);
        $medicamentoFarmacia->delete();

        return redirect()->route('medicamentos_farmacia.index')->with('success', 'Medicamento na farmácia removido com sucesso.');
    }
}
