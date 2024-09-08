@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Cadastrar médico</h2>
    <form action="{{ route('medicos.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="nome_medico" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome_medico" name="nome_medico" required>
        </div>
        <div class="mb-3">
            <label for="cpf" class="form-label">CPF:</label>
            <input type="text" class="form-control" id="cpf" name="cpf" required>
        </div>
        <div class="mb-3">
            <label for="crm" class="form-label">CRM:</label>
            <input type="text" class="form-control" id="crm" name="crm" required>
        </div>
        <div class="mb-3">
            <label for="especialidade" class="form-label">Especialidade:</label>
            <input type="text" class="form-control" id="especialidade" name="especialidade" required>
        </div>
        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone:</label>
            <input type="text" class="form-control" id="telefone" name="telefone" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço:</label>
            <input type="text" class="form-control" id="endereco" name="endereco" required>
        </div>
        
        <button type="submit" class="btn btn-warning">Salvar</button>
    </form>
</div>
@endsection