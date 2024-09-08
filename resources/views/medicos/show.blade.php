@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Informações do Médico</h2>
    <h1>{{ $medico->nome_medico }}</h1>
    <p><strong>CPF:</strong> {{ $medico->cpf }}</p>
    <p><strong>CRM:</strong> {{ $medico->crm }}</p>
    <p><strong>Especialidade:</strong> {{ $medico->especialidade }}</p>
    <p><strong>Telefone:</strong> {{ $medico->telefone }}</p>
    <p><strong>Email:</strong> {{ $medico->email }}</p>
    <p><strong>Endereço:</strong> {{ $medico->endereco }}</p>
    <a href="{{ route('medicos.edit', $medico) }}" class="btn btn-warning">Editar</a>
    <a href="{{ route('medicos.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
