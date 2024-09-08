@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detalhes do Prontuário</h2>

    <div class="form-group mb-3">
        <label>Paciente:</label>
        <p>{{ $prontuario->paciente->nome_completo }}</p>
    </div>

    <div class="form-group mb-3">
        <label>Arquivos:</label>
        @if($prontuario->arquivos && is_array($prontuario->arquivos))  
            <ul>
                @foreach($prontuario->arquivos as $arquivo)  
                    <li>
                        <a href="{{ asset('storage/' . $arquivo) }}" target="_blank">
                            {{ basename($arquivo) }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>Nenhum arquivo</p>
        @endif
    </div>

    <a href="{{ route('prontuarios.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
