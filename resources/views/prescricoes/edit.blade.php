@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Prescrição</h2>

    <form action="{{ route('prescricoes.update', $prescricao->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="medico_id" class="form-label">Médico Responsável:</label>
            <select class="form-select" id="medico_id" name="medico_id" required>
                @foreach ($medicos as $medico)
                    <option value="{{ $medico->id }}" {{ $prescricao->medico_id == $medico->id ? 'selected' : '' }}>
                        {{ $medico->nome_medico }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente:</label>
            <select class="form-select" id="paciente_id" name="paciente_id" required>
                @foreach ($pacientes as $paciente)
                    <option value="{{ $paciente->id }}" {{ $prescricao->paciente_id == $paciente->id ? 'selected' : '' }}>
                        {{ $paciente->nome_completo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="medicamento_id" class="form-label">Medicamento:</label>
            <select class="form-select" id="medicamento_id" name="medicamento_id" required>
                @foreach ($medicamentos as $medicamento)
                    <option value="{{ $medicamento->id }}" {{ $prescricao->medicamento_id == $medicamento->id ? 'selected' : '' }}>
                        {{ $medicamento->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="dosagem" class="form-label">Dosagem:</label>
            <input type="text" class="form-control" id="dosagem" name="dosagem" value="{{ $prescricao->dosagem }}" required>
        </div>

        <div class="mb-3">
            <label for="frequencia" class="form-label">Frequência:</label>
            <input type="text" class="form-control" id="frequencia" name="frequencia" value="{{ $prescricao->frequencia }}" required>
        </div>

        <div class="mb-3">
            <label for="duracao" class="form-label">Duração:</label>
            <input type="text" class="form-control" id="duracao" name="duracao" value="{{ $prescricao->duracao }}" required>
        </div>

        <div class="mb-3">
            <label for="data_prescricao" class="form-label">Data da Prescrição:</label>
            <input type="date" class="form-control" id="data_prescricao" name="data_prescricao" value="{{ $prescricao->data_prescricao->format('Y-m-d') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Atualizar Prescrição</button>
        <a href="{{ route('prescricoes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
