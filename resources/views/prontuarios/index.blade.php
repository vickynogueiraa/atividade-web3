@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Prontuários</h1>
    <br>
    <a href="{{ route('prontuarios.create') }}" class="btn btn-primary mb-3">Novo Prontuário</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Paciente</th>
                <th>Arquivos</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prontuarios as $prontuario)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $prontuario->paciente->nome_completo }}</td>
                <td>
                    @if(!empty($prontuario->arquivos) && is_array($prontuario->arquivos))
                        <ul>
                            @foreach($prontuario->arquivos as $arquivo)
                                <li><a href="{{ asset('storage/' . $arquivo) }}" target="_blank">{{ basename($arquivo) }}</a></li>
                            @endforeach
                        </ul>
                    @else
                        Nenhum arquivo
                    @endif
                </td>
                <td>
                    <a href="{{ route('prontuarios.show', $prontuario->id) }}" class="btn btn-info btn-sm">Visualizar</a>
                    <a href="{{ route('prontuarios.edit', $prontuario->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('prontuarios.destroy', $prontuario->id) }}" method="post" class="d-inline">
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
