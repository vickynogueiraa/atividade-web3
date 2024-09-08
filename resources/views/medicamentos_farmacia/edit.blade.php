@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Medicamento na Farmácia</h2>

    <form action="{{ route('medicamentos_farmacia.update', $medicamentoFarmacia->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="medicamento_id" class="form-label">Medicamento:</label>
            <select id="medicamento_id" name="medicamento_id" class="form-select" required>
                @foreach($medicamentos as $medicamento)
                    <option value="{{ $medicamento->id }}" {{ $medicamentoFarmacia->medicamento_id == $medicamento->id ? 'selected' : '' }}>
                        {{ $medicamento->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="farmacia_id" class="form-label">Farmácia:</label>
            <select id="farmacia_id" name="farmacia_id" class="form-select" required>
                @foreach($farmacias as $farmacia)
                    <option value="{{ $farmacia->id }}" {{ $medicamentoFarmacia->farmacia_id == $farmacia->id ? 'selected' : '' }}>
                        {{ $farmacia->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="preco" class="form-label">Preço:</label>
            <input type="number" step="0.01" id="preco" name="preco" class="form-control" value="{{ $medicamentoFarmacia->preco }}" required>
        </div>

        <div class="mb-3">
            <label for="estoque" class="form-label">Estoque:</label>
            <input type="number" id="estoque" name="estoque" class="form-control" value="{{ $medicamentoFarmacia->estoque }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
