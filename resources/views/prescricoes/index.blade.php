@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Prescrições cadastradas no sistema</h1>
    <br>
    <a href="{{ route('prescricoes.create') }}" class="btn btn-primary mb-3">Adicionar Prescrição</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Médico</th>
                <th>Paciente</th>
                <th>Medicamento</th>
                <th>Dosagem</th>
                <th>Frequência</th>
                <th>Duração</th>
                <th>Data da Prescrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prescricoes as $prescricao)
                <tr>
                    <td>{{ $prescricao->medico->nome_medico }}</td>
                    <td>{{ $prescricao->paciente->nome_completo }}</td>
                    <td>{{ $prescricao->medicamento->nome }}</td>
                    <td>{{ $prescricao->dosagem }}</td>
                    <td>{{ $prescricao->frequencia }}</td>
                    <td>{{ $prescricao->duracao }}</td>
                    <td>{{ $prescricao->data_prescricao->format('d/m/Y') }}</td>
                    <td>
                        <a href="{{ route('prescricoes.show', $prescricao->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('prescricoes.edit', $prescricao->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('prescricoes.destroy', $prescricao->id) }}" method="POST" class="d-inline">
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
