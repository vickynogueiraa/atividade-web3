<?php

namespace App\Http\Controllers;

use App\Models\Farmacia;
use Illuminate\Http\Request;

class FarmaciaController extends Controller
{
    public function index()
    {
        $farmacias = Farmacia::all();
        return view('farmacias.index', compact('farmacias'));
    }

    public function create()
    {
        return view('farmacias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'telefone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'horario_funcionamento' => 'required|string|max:255',
            'tipo' => 'required|string|in:comum,especializada',
        ]);

        Farmacia::create($request->all());

        return redirect()->route('farmacias.index')->with('success', 'Farmácia criada com sucesso.');
    }

    public function show($id)
    {
        $farmacia = Farmacia::findOrFail($id);
        return view('farmacias.show', compact('farmacia'));
    }

    public function edit($id)
    {
        $farmacia = Farmacia::findOrFail($id);
        return view('farmacias.edit', compact('farmacia'));
    }

    public function update(Request $request, $id)
    {
        $farmacia = Farmacia::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'telefone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'horario_funcionamento' => 'required|string|max:255',
            'tipo' => 'required|string|in:comum,especializada',
        ]);

        $farmacia->update($request->all());

        return redirect()->route('farmacias.index')->with('success', 'Farmácia atualizada com sucesso.');
    }

    public function destroy($id)
    {
        $farmacia = Farmacia::findOrFail($id);
        $farmacia->delete();

        return redirect()->route('farmacias.index')->with('success', 'Farmácia removida com sucesso.');
    }
}
