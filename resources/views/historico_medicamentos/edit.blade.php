@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Histórico de Medicamento</h2>

    <form action="{{ route('historico_medicamentos.update', $historico->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente:</label>
            <select id="paciente_id" name="paciente_id" class="form-select" required>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}" {{ $historico->paciente_id == $paciente->id ? 'selected' : '' }}>
                        {{ $paciente->nome_completo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="medicamento_id" class="form-label">Medicamento:</label>
            <select id="medicamento_id" name="medicamento_id" class="form-select" required>
                @foreach($medicamentos as $medicamento)
                    <option value="{{ $medicamento->id }}" {{ $historico->medicamento_id == $medicamento->id ? 'selected' : '' }}>
                        {{ $medicamento->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" class="form-control" value="{{ $historico->quantidade }}" required>
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data:</label>
            <input type="date" id="data" name="data" class="form-control" value="{{ $historico->data->format('Y-m-d') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
