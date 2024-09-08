@extends('layouts.app')

@section('title', 'Editar Consulta')

@section('content')
<div class="container">
    <h1>Editar Consulta</h1>
    <form action="{{ route('consultas.update', $consulta) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="medico_id" class="form-label">Médico:</label>
            <select class="form-select" id="medico_id" name="medico_id" required>
                @foreach ($medicos as $medico)
                    <option value="{{ $medico->id }}" {{ $consulta->medico_id == $medico->id ? 'selected' : '' }}>
                        {{ $medico->nome_medico }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente:</label>
            <select class="form-select" id="paciente_id" name="paciente_id" required>
                @foreach ($pacientes as $paciente)
                    <option value="{{ $paciente->id }}" {{ $consulta->paciente_id == $paciente->id ? 'selected' : '' }}>
                        {{ $paciente->nome_completo }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="data" class="form-label">Data:</label>
            <input type="datetime-local" class="form-control" id="data" name="data" value="{{ $consulta->data }}" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Motivo da consulta:</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" required>{{ $consulta->descricao }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
