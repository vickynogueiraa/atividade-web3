@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Novo Pedido</h2>

    <form action="{{ route('pedidos.store') }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente:</label>
            <select id="paciente_id" name="paciente_id" class="form-select" required>
                <option value="">Selecione um paciente</option>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->nome_completo }}</option>
                @endforeach
            </select>
        </div>

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
            <label for="quantidade" class="form-label">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" class="form-control" required>
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
            <label for="status" class="form-label">Status:</label>
            <select id="status" name="status" class="form-select" required>
                <option value="pendente">Pendente</option>
                <option value="aprovado">Aprovado</option>
                <option value="cancelado">Cancelado</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="data" class="form-label">Data:</label>
            <input type="date" id="data" name="data" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
