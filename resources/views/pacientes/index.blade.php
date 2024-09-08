@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pacientes cadastrados no sistema</h1>
    <br>
    <a href="{{ route('pacientes.create') }}" class="btn btn-primary mb-3">Adicionar Novo Paciente</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nome Completo</th>
                <th>CPF</th>
                <th>Data de Nascimento</th>
                <th>Telefone</th>
                <th>E-mail</th>
                <th>Endereço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pacientes as $paciente)
            <tr>
                    <td>{{ $paciente->nome_completo }}</td>
                    <td>{{ $paciente->cpf }}</td>
                    <td>{{ $paciente->data_nascimento }}</td>
                    <td>{{ $paciente->telefone }}</td>
                    <td>{{ $paciente->email }}</td>
                    <td>{{ $paciente->endereco }}</td>
                    <td>
                        <a href="{{ route('pacientes.show', $paciente) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('pacientes.edit', $paciente) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('pacientes.destroy', $paciente) }}" method="POST" style="display:inline;">
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