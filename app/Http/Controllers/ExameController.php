<?php

namespace App\Http\Controllers;

use App\Models\Exame;
use Illuminate\Http\Request;

class ExameController extends Controller
{
    public function index()
    {
        $exames = Exame::all();
        return view('exames.index', compact('exames'));
    }

    public function create()
    {
        return view('exames.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        Exame::create($request->all());

        return redirect()->route('exames.index')->with('success', 'Exame criado com sucesso.');
    }

    public function show($id)
    {
        $exame = Exame::findOrFail($id);
        return view('exames.show', compact('exame'));
    }

    public function edit($id)
    {
        $exame = Exame::findOrFail($id);
        return view('exames.edit', compact('exame'));
    }

    public function update(Request $request, $id)
    {
        $exame = Exame::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        $exame->update($request->all());

        return redirect()->route('exames.index')->with('success', 'Exame atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $exame = Exame::findOrFail($id);
        $exame->delete();

        return redirect()->route('exames.index')->with('success', 'Exame removido com sucesso.');
    }
}
