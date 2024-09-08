@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Formulário de Consulta</h2>
    <form action="{{ route('consultas.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="medico_id" class="form-label">Médico:</label>
            <select class="form-select" id="medico_id" name="medico_id" required>
                <option value="">Selecione um Médico</option>
                @foreach ($medicos as $medico)
                    <option value="{{ $medico->id }}">{{ $medico->nome_medico }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente:</label>
            <select class="form-select" id="paciente_id" name="paciente_id" required>
                <option value="">Selecione um Paciente</option>
                @foreach ($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->nome_completo }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="data" class="form-label">Data:</label>
            <input type="datetime-local" class="form-control" id="data" name="data" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Motivo da consulta:</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
