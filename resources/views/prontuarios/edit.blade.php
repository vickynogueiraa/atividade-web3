@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Prontuário</h1>

    <form action="{{ route('prontuarios.update', $prontuario->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Seleção de Paciente -->
        <div class="form-group mb-3">
            <label for="paciente_id">Paciente:</label>
            <select name="paciente_id" id="paciente_id" class="form-control" required>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}" {{ $paciente->id == $prontuario->paciente_id ? 'selected' : '' }}>
                        {{ $paciente->nome_completo }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Exibir arquivos atuais -->
        <div class="form-group mb-3">
            <label>Arquivos atuais:</label>
            @if(!empty($prontuario->arquivos) && is_array($prontuario->arquivos))
                <ul>
                    @foreach($prontuario->arquivos as $arquivo)
                        <li><a href="{{ asset('storage/' . $arquivo) }}" target="_blank">{{ basename($arquivo) }}</a></li>
                    @endforeach
                </ul>
            @else
                <p>Nenhum arquivo anexado.</p>
            @endif
        </div>

        <!-- Upload de novos arquivos -->
        <div class="form-group mb-3">
            <label for="arquivos">Selecionar novos arquivos (Substituir arquivos atuais)</label>
            <input type="file" name="arquivos[]" id="arquivos" class="form-control" multiple>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('prontuarios.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
