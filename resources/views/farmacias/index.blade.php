@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Farmácias cadastradas no sistema</h1>
    <br>
    <a href="{{ route('farmacias.create') }}" class="btn btn-primary mb-3">Adicionar Farmácia</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Telefone</th>
                <th>Email</th>
                <th>Horário de Funcionamento</th>
                <th>Tipo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($farmacias as $farmacia)
                <tr>
                    <td>{{ $farmacia->nome }}</td>
                    <td>{{ $farmacia->endereco }}</td>
                    <td>{{ $farmacia->telefone }}</td>
                    <td>{{ $farmacia->email }}</td>
                    <td>{{ $farmacia->horario_funcionamento }}</td>
                    <td>{{ $farmacia->tipo }}</td>
                    <td>
                        <a href="{{ route('farmacias.show', $farmacia->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('farmacias.edit', $farmacia->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('farmacias.destroy', $farmacia->id) }}" method="post" class="d-inline">
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
