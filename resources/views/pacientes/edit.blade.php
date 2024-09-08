@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Atualizar Dados do paciente</h2>
    <form action="{{ route('pacientes.update', $paciente) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome_completo" class="form-label">Nome Completo:</label>
            <input type="text" class="form-control" id="nome_completo" name="nome_completo" value="{{ $paciente->nome_completo }}" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF:</label>
            <input type="text" class="form-control" id="cpf" name="cpf" value="{{ $paciente->cpf }}" required>
        </div>
        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" value="{{ $paciente->data_nascimento }}" required>
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone:</label>
            <input type="text" class="form-control" id="telefone" name="telefone" value="{{ $paciente->telefone }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $paciente->email }}" required>
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço:</label>
            <input type="text" class="form-control" id="endereco" name="endereco" value="{{ $paciente->endereco }}" required>
        </div>
        <button type="submit" class="btn btn-light">Atualizar</button>
    </form>
</div>
@endsection
