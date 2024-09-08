<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Paciente;
use App\Models\Medicamento;
use App\Models\Farmacia;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::all();
        return view('pedidos.index', compact('pedidos'));
    }

    public function create()
    {
        $pacientes = Paciente::all();
        $medicamentos = Medicamento::all();
        $farmacias = Farmacia::all();
        return view('pedidos.create', compact('pacientes', 'medicamentos', 'farmacias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medicamento_id' => 'required|exists:medicamentos,id',
            'quantidade' => 'required|integer|min:1',
            'farmacia_id' => 'required|exists:farmacias,id',
            'status' => 'required|in:pendente,aprovado,cancelado',
            'data' => 'required|date',
        ]);

        Pedido::create($request->all());

        return redirect()->route('pedidos.index')->with('success', 'Pedido cadastrado com sucesso.');
    }

    public function show($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('pedidos.show', compact('pedido'));
    }

    public function edit($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pacientes = Paciente::all();
        $medicamentos = Medicamento::all();
        $farmacias = Farmacia::all();
        return view('pedidos.edit', compact('pedido', 'pacientes', 'medicamentos', 'farmacias'));
    }

    public function update(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);

        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medicamento_id' => 'required|exists:medicamentos,id',
            'quantidade' => 'required|integer|min:1',
            'farmacia_id' => 'required|exists:farmacias,id',
            'status' => 'required|in:pendente,aprovado,cancelado',
            'data' => 'required|date',
        ]);

        $pedido->update($request->all());

        return redirect()->route('pedidos.index')->with('success', 'Pedido atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();

        return redirect()->route('pedidos.index')->with('success', 'Pedido removido com sucesso.');
    }
}
