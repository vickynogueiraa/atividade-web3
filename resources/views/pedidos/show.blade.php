@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Informações do Pedido</h2>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Pedido ID: {{ $pedido->id }}</h5>
        </div>
        <div class="card-body">
            <p><strong>Paciente:</strong> {{ $pedido->paciente->nome_completo }}</p>
            <p><strong>Medicamento:</strong> {{ $pedido->medicamento->nome }}</p>
            <p><strong>Quantidade:</strong> {{ $pedido->quantidade }}</p>
            <p><strong>Farmácia:</strong> {{ $pedido->farmacia->nome }}</p>
            <p><strong>Status:</strong> {{ ucfirst($pedido->status) }}</p>
            <p><strong>Data:</strong> {{ $pedido->data->format('d/m/Y') }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Voltar</a>
            <a href="{{ route('pedidos.edit', $pedido->id) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="post" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>
</div>
@endsection
