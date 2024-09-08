@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Histórico de Medicamentos</h1>
    <br>
    <a href="{{ route('historico_medicamentos.create') }}" class="btn btn-primary mb-3">Novo Histórico</a>

    @if($historicoMedicamentos->isEmpty())
        <p class="alert alert-info">Nenhum histórico encontrado.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Paciente</th>
                    <th>Medicamento</th>
                    <th>Quantidade</th>
                    <th>Data</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($historicoMedicamentos as $historico)
                    <tr>
                        <td>{{ $historico->id }}</td>
                        <td>{{ $historico->paciente->nome }}</td>
                        <td>{{ $historico->medicamento->nome }}</td>
                        <td>{{ $historico->quantidade }}</td>
                        <td>{{ $historico->data->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('historico_medicamentos.show', $historico->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('historico_medicamentos.edit', $historico->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('historico_medicamentos.destroy', $historico->id) }}" method="post" class="d-inline">
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
