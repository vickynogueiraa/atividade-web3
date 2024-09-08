<?php

namespace App\Http\Controllers;

use App\Models\Prontuario;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProntuarioController extends Controller
{
    public function index()
    {
        $prontuarios = Prontuario::with('paciente')->get();
        return view('prontuarios.index', compact('prontuarios'));
    }

    public function create()
    {
        $pacientes = Paciente::all();
        return view('prontuarios.create', compact('pacientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'arquivos.*' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $arquivos = [];
        if ($request->hasFile('arquivos')) {
            foreach ($request->file('arquivos') as $arquivo) {
                $arquivos[] = $arquivo->store('prontuarios', 'public');
            }
        }

        Prontuario::create([
            'paciente_id' => $request->paciente_id,
            'arquivos' => $arquivos,  // Armazenar como array
        ]);

        return redirect()->route('prontuarios.index')->with('success', 'Prontuário criado com sucesso.');
    }

    public function show($id)
    {
        $prontuario = Prontuario::with('paciente')->findOrFail($id);
        return view('prontuarios.show', compact('prontuario'));
    }

    public function edit($id)
    {
        $prontuario = Prontuario::findOrFail($id);
        $pacientes = Paciente::all();
        return view('prontuarios.edit', compact('prontuario', 'pacientes'));
    }

    public function update(Request $request, $id)
    {
        $prontuario = Prontuario::findOrFail($id);
    
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'arquivos.*' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);
    
        
        $arquivos = $prontuario->arquivos ?? [];  
        if ($request->hasFile('arquivos')) {
            
            foreach ($arquivos as $arquivo) {
                Storage::disk('public')->delete($arquivo);
            }
    
          
            $arquivos = [];
            foreach ($request->file('arquivos') as $arquivo) {
                $arquivos[] = $arquivo->store('prontuarios', 'public');
            }
        }
    
        $prontuario->update([
            'paciente_id' => $request->paciente_id,
            'arquivos' => $arquivos,  
        ]);
    
        return redirect()->route('prontuarios.index')->with('success', 'Prontuário atualizado com sucesso.');
    }

    public function destroy($id)
{
    $prontuario = Prontuario::findOrFail($id);

    
    if (!empty($prontuario->arquivos) && is_array($prontuario->arquivos)) {
        foreach ($prontuario->arquivos as $arquivo) {
            Storage::disk('public')->delete($arquivo);
        }
    }

    $prontuario->delete();

    return redirect()->route('prontuarios.index')->with('success', 'Prontuário excluído com sucesso.');
}
}
