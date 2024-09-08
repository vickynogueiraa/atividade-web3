@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalhes da Prescrição</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Médico Responsável: {{ $prescricao->medico->nome_medico }}</h5>
            <p class="card-text"><strong>Paciente:</strong> {{ $prescricao->paciente->nome_completo }}</p>
            <p class="card-text"><strong>Medicamento:</strong> {{ $prescricao->medicamento->nome }}</p>
            <p class="card-text"><strong>Dosagem:</strong> {{ $prescricao->dosagem }}</p>
            <p class="card-text"><strong>Frequência:</strong> {{ $prescricao->frequencia }}</p>
            <p class="card-text"><strong>Duração:</strong> {{ $prescricao->duracao }}</p>
            <p class="card-text"><strong>Data da Prescrição:</strong> {{ $prescricao->data_prescricao->format('d/m/Y') }}</p>
        </div>
    </div>

    <a href="{{ route('prescricoes.index') }}" class="btn btn-primary mt-3">Voltar</a>
    <a href="{{ route('prescricoes.edit', $prescricao->id) }}" class="btn btn-warning mt-3">Editar</a>
</div>
@endsection
