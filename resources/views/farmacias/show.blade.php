@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Informações da Farmácia</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nome: {{ $farmacia->nome }}</h5>
            <p class="card-text"><strong>Endereço:</strong> {{ $farmacia->endereco }}</p>
            <p class="card-text"><strong>Telefone:</strong> {{ $farmacia->telefone }}</p>
            <p class="card-text"><strong>Email:</strong> {{ $farmacia->email }}</p>
            <p class="card-text"><strong>Horário de Funcionamento:</strong> {{ $farmacia->horario_funcionamento }}</p>
            <p class="card-text"><strong>Tipo:</strong> {{ $farmacia->tipo }}</p>
        </div>
    </div>

    <a href="{{ route('farmacias.index') }}" class="btn btn-primary mt-3">Voltar</a>
    <a href="{{ route('farmacias.edit', $farmacia->id) }}" class="btn btn-warning mt-3">Editar</a>
</div>
@endsection
