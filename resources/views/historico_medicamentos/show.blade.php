@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Informações do Histórico de Medicamento</h2>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Histórico ID: {{ $historico->id }}</h5>
        </div>
        <div class="card-body">
            <p><strong>Paciente:</strong> {{ $historico->paciente->nome_completo }}</p>
            <p><strong>Medicamento:</strong> {{ $historico->medicamento->nome }}</p>
            <p><strong>Quantidade:</strong> {{ $historico->quantidade }}</p>
            <p><strong>Data:</strong> {{ $historico->data->format('d/m/Y') }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('historico_medicamentos.index') }}" class="btn btn-secondary">Voltar</a>
            <a href="{{ route('historico_medicamentos.edit', $historico->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('historico_medicamentos.destroy', $historico->id) }}" method="post" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>
</div>
@endsection
