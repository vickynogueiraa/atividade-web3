@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Medicamento</h2>

    <form action="{{ route('medicamentos.update', $medicamento->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Medicamento:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $medicamento->nome }}" required>
        </div>

        <div class="mb-3">
            <label for="dosagem" class="form-label">Dosagem:</label>
            <input type="text" class="form-control" id="dosagem" name="dosagem" value="{{ $medicamento->dosagem }}" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" required>{{ $medicamento->descricao }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Atualizar Medicamento</button>
        <a href="{{ route('medicamentos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
