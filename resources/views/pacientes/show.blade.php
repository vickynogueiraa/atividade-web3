@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Informações do Paciente</h2>
    <div class="mb-3">
        <label class="form-label"><strong>Nome Completo:</strong></label>
        <p>{{ $paciente->nome_completo }}</p>
    </div>
    <div class="mb-3">
        <label class="form-label"><strong>CPF:</strong></label>
        <p>{{ $paciente->cpf }}</p>
    </div>
    <div class="mb-3">
        <label class="form-label"><strong>Data de Nascimento:</strong></label>
        <p>{{ $paciente->data_nascimento }}</p>
    </div>
    <div class="mb-3">
        <label class="form-label"><strong>Telefone:</strong></label>
        <p>{{ $paciente->telefone }}</p>
    </div>
    <div class="mb-3">
        <label class="form-label"><strong>Email:</strong></label>
        <p>{{ $paciente->email }}</p>
    </div>
    <div class="mb-3">
        <label class="form-label"><strong>Endereço:</strong></label>
        <p>{{ $paciente->endereco }}</p>
    </div>
    <a href="{{ route('pacientes.edit', $paciente) }}" class="btn btn-warning">Editar</a>
    <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
