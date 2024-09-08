@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Lista de Exames</h1>
        <br>
        <a href="{{ route('exames.create') }}" class="btn btn-primary mb-3">Novo Exame</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($exames as $exame)
                    <tr>
                        <td>{{ $exame->id }}</td>
                        <td>{{ $exame->nome }}</td>
                        <td>{{ $exame->descricao }}</td>
                        <td>
                            <a href="{{ route('exames.show', $exame->id) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('exames.edit', $exame->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('exames.destroy', $exame->id) }}" method="post" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
