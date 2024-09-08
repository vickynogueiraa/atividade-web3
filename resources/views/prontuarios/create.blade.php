@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Criar Prontuário</h1>

    <form action="{{ route('prontuarios.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label for="paciente_id">Paciente:</label>
            <select name="paciente_id" id="paciente_id" class="form-control" required>
                <option value="">Selecione um paciente</option>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->nome_completo }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="arquivos">Arquivos</label>
            <input type="file" name="arquivos[]" id="arquivos" class="form-control" multiple>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('prontuarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
