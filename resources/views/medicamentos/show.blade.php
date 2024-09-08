@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Informações do Medicamento</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nome do Medicamento: {{ $medicamento->nome }}</h5>
            <p class="card-text"><strong>Dosagem:</strong> {{ $medicamento->dosagem }}</p>
            <p class="card-text"><strong>Descrição:</strong> {{ $medicamento->descricao }}</p>
        </div>
    </div>

    <a href="{{ route('medicamentos.index') }}" class="btn btn-primary mt-3">Voltar</a>
    <a href="{{ route('medicamentos.edit', $medicamento->id) }}" class="btn btn-warning mt-3">Editar</a>
</div>
@endsection
