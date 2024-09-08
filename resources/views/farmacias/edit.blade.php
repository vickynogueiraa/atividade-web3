@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Farmácia</h2>

    <form action="{{ route('farmacias.update', $farmacia->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $farmacia->nome }}" required>
        </div>

        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço:</label>
            <input type="text" class="form-control" id="endereco" name="endereco" value="{{ $farmacia->endereco }}" required>
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone:</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="{{ $farmacia->telefone }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $farmacia->email }}" required>
        </div>

        <div class="mb-3">
            <label for="horario_funcionamento" class="form-label">Horário de Funcionamento:</label>
            <input type="text" class="form-control" id="horario_funcionamento" name="horario_funcionamento" value="{{ $farmacia->horario_funcionamento }}" required>
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo:</label>
            <input type="text" class="form-control" id="tipo" name="tipo" value="{{ $farmacia->tipo }}" required>
        </div>

        <button type="submit" class="btn btn-success">Atualizar Farmácia</button>
        <a href="{{ route('farmacias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
