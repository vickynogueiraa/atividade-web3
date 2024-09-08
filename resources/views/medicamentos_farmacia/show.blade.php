@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Informações do Medicamento na Farmácia</h2>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Medicamento: {{ $medicamentoFarmacia->medicamento->nome }}</h5>
        </div>
        <div class="card-body">
            <p><strong>Farmácia:</strong> {{ $medicamentoFarmacia->farmacia->nome }}</p>
            <p><strong>Preço:</strong> R$ {{ number_format($medicamentoFarmacia->preco, 2, ',', '.') }}</p>
            <p><strong>Estoque:</strong> {{ $medicamentoFarmacia->estoque }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('medicamentos_farmacia.index') }}" class="btn btn-secondary">Voltar</a>
            <a href="{{ route('medicamentos_farmacia.edit', $medicamentoFarmacia->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('medicamentos_farmacia.destroy', $medicamentoFarmacia->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>
</div>
@endsection
