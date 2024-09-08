@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Pedido</h1>

    <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente:</label>
            <select id="paciente_id" name="paciente_id" class="form-select" required>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}" {{ $pedido->paciente_id == $paciente->id ? 'selected' : '' }}>
                        {{ $paciente->nome_completo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="medicamento_id" class="form-label">Medicamento:</label>
            <select id="medicamento_id" name="medicamento_id" class="form-select" required>
                @foreach($medicamentos as $medicamento)
                    <option value="{{ $medicamento->id }}" {{ $pedido->medicamento_id == $medicamento->id ? 'selected' : '' }}>
                        {{ $medicamento->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" class="form-control" value="{{ $pedido->quantidade }}" required>
        </div>

        <div class="mb-3">
            <label for="farmacia_id" class="form-label">Farmácia:</label>
            <select id="farmacia_id" name="farmacia_id" class="form-select" required>
                @foreach($farmacias as $farmacia)
                    <option value="{{ $farmacia->id }}" {{ $pedido->farmacia_id == $farmacia->id ? 'selected' : '' }}>
                        {{ $farmacia->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select id="status" name="status" class="form-select" required>
                <option value="pendente" {{ $pedido->status == 'pendente' ? 'selected' : '' }}>Pendente</option>
                <option value="aprovado" {{ $pedido->status == 'aprovado' ? 'selected' : '' }}>Aprovado</option>
                <option value="cancelado" {{ $pedido->status == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data:</label>
            <input type="date" id="data" name="data" class="form-control" value="{{ $pedido->data->format('Y-m-d') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection
