@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Prescrição</h2>

    <form action="{{ route('prescricoes.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="medico_id" class="form-label">Médico Responsável:</label>
            <select class="form-select" id="medico_id" name="medico_id" required>
                <option value="">Selecione o Médico</option>
                @foreach ($medicos as $medico)
                    <option value="{{ $medico->id }}">{{ $medico->nome_medico }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente:</label>
            <select class="form-select" id="paciente_id" name="paciente_id" required>
                <option value="">Selecione o Paciente</option>
                @foreach ($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->nome_completo }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="medicamento_id" class="form-label">Medicamento:</label>
            <select class="form-select" id="medicamento_id" name="medicamento_id" required>
                <option value="">Selecione o Medicamento</option>
                @foreach ($medicamentos as $medicamento)
                    <option value="{{ $medicamento->id }}">{{ $medicamento->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="dosagem" class="form-label">Dosagem:</label>
            <input type="text" class="form-control" id="dosagem" name="dosagem" required>
        </div>

        <div class="mb-3">
            <label for="frequencia" class="form-label">Frequência:</label>
            <input type="text" class="form-control" id="frequencia" name="frequencia" required>
        </div>

        <div class="mb-3">
            <label for="duracao" class="form-label">Duração:</label>
            <input type="text" class="form-control" id="duracao" name="duracao" required>
        </div>

        <div class="mb-3">
            <label for="data_prescricao" class="form-label">Data da Prescrição:</label>
            <input type="date" class="form-control" id="data_prescricao" name="data_prescricao" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar Prescrição</button>
        <a href="{{ route('prescricoes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
