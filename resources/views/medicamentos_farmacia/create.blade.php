@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Cadastrar medicamento à farmácia</h2>

    <form action="{{ route('medicamentos_farmacia.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="medicamento_id" class="form-label">Medicamento:</label>
            <select id="medicamento_id" name="medicamento_id" class="form-select" required>
                <option value="">Selecione um medicamento</option>
                @foreach($medicamentos as $medicamento)
                    <option value="{{ $medicamento->id }}">{{ $medicamento->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="farmacia_id" class="form-label">Farmácia:</label>
            <select id="farmacia_id" name="farmacia_id" class="form-select" required>
                <option value="">Selecione uma farmácia</option>
                @foreach($farmacias as $farmacia)
                    <option value="{{ $farmacia->id }}">{{ $farmacia->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="preco" class="form-label">Preço:</label>
            <input type="number" step="0.01" id="preco" name="preco" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="estoque" class="form-label">Estoque:</label>
            <input type="number" id="estoque" name="estoque" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
