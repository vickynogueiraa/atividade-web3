@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Médicos cadastrados no sistema</h1>
    <br>
    <a href="{{ route('medicos.create') }}" class="btn btn-primary mb-3">Adicionar novo médico</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CRM</th>
                <th>Especialidade</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medicos as $medico)
            <tr>
                <td>{{ $medico->nome_medico }}</td>
                <td>{{ $medico->crm }}</td>
                <td>{{ $medico->especialidade }}</td>
                <td>
                <a href="{{ route('medicos.show', $medico) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('medicos.edit', $medico) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('medicos.destroy', $medico) }}" method="post" style="display:inline;">
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