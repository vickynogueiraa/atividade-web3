@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Medicamentos</h1>
    <br>
    <a href="{{ route('medicamentos.create') }}" class="btn btn-primary mb-3">Adicionar Medicamento</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Dosagem</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($medicamentos as $medicamento)
                <tr>
                    <td>{{ $medicamento->nome }}</td>
                    <td>{{ $medicamento->dosagem }}</td>
                    <td>{{ $medicamento->descricao }}</td>
                    <td>
                        <a href="{{ route('medicamentos.show', $medicamento->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('medicamentos.edit', $medicamento->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('medicamentos.destroy', $medicamento->id) }}" method="post" class="d-inline">
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
