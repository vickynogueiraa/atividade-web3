@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Criar Novo Exame</h2>

        <form action="{{ route('exames.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="nome">Nome do Exame:</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao" class="form-control" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Salvar</button>
        </form>
    </div>
@endsection
