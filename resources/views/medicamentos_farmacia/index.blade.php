@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Medicamentos nas Farmácias</h1>
    <br>
    <a href="{{ route('medicamentos_farmacia.create') }}" class="btn btn-primary mb-3">Adicionar Medicamento na Farmácia</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Medicamento</th>
                <th>Farmácia</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicamentosFarmacia as $item)
                <tr>
                    <td>{{ $item->medicamento->nome }}</td>
                    <td>{{ $item->farmacia->nome }}</td>
                    <td>{{ $item->preco }}</td>
                    <td>{{ $item->estoque }}</td>
                    <td>
                        <a href="{{ route('medicamentos_farmacia.show', $item->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('medicamentos_farmacia.edit', $item->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('medicamentos_farmacia.destroy', $item->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
