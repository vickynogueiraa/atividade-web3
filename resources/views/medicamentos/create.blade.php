@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Adicionar Medicamento</h2>
    <br>
    <form action="{{ route('medicamentos.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Medicamento:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>

        <div class="mb-3">
            <label for="dosagem" class="form-label">Dosagem:</label>
            <input type="text" class="form-control" id="dosagem" name="dosagem" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição:</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Salvar Medicamento</button>
        <a href="{{ route('medicamentos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
