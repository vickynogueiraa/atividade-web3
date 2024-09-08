@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Consultas agendadas no sistema</h1>
    <br>
    <a href="{{ route('consultas.create') }}" class="btn btn-primary mb-3">Adicionar Nova Consulta</a>
    <table class="table">
        <thead>
            <tr>
                <th>Médico Responsável</th>
                <th>Paciente</th>
                <th>Data</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consultas as $consulta)
                <tr>
                    <td>{{ $consulta->medico->nome_medico }}</td>
                    <td>{{ $consulta->paciente->nome_completo }}</td>
                    <td>{{ $consulta->data }}</td>
                    <td>{{ $consulta->descricao }}</td>
                    <td>
                        <a href="{{ route('consultas.show', $consulta) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('consultas.edit', $consulta) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('consultas.destroy', $consulta) }}" method="post" style="display:inline;">
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
