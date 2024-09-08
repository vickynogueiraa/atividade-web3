@extends('layouts.app')

@section('content')
<div class="container">
    <h1 >Pedidos</h1>
    <br>
    <a href="{{ route('pedidos.create') }}" class="btn btn-primary mb-3">Novo Pedido</a>

    @if($pedidos->isEmpty())
        <p class="alert alert-info">Nenhum pedido encontrado.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Paciente</th>
                    <th>Medicamento</th>
                    <th>Quantidade</th>
                    <th>Farmácia</th>
                    <th>Status</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->id }}</td>
                        <td>{{ $pedido->paciente->nome }}</td>
                        <td>{{ $pedido->medicamento->nome }}</td>
                        <td>{{ $pedido->quantidade }}</td>
                        <td>{{ $pedido->farmacia->nome }}</td>
                        <td>{{ $pedido->status }}</td>
                        <td>{{ $pedido->data->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('pedidos.show', $pedido->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('pedidos.edit', $pedido->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
