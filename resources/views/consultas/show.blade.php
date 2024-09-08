@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Informações da Consulta</h2>
    <div class="mb-3">
        <label class="form-label"><strong>Médico:</strong></label>
        <p>{{ $consulta->medico->nome_medico }}</p>
    </div>
    <div class="mb-3">
        <label class="form-label"><strong>Paciente:</strong></label>
        <p>{{ $consulta->paciente->nome_completo }}</p>
    </div>
    <div class="mb-3">
        <label class="form-label"><strong>Data:</strong></label>
        <p>{{ $consulta->data }}</p>
    </div>
    <div class="mb-3">
        <label class="form-label"><strong>Descrição:</strong></label>
        <p>{{ $consulta->descricao }}</p>
    </div>
    <a href="{{ route('consultas.edit', $consulta) }}" class="btn btn-warning">Editar</a>
    <a href="{{ route('consultas.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
