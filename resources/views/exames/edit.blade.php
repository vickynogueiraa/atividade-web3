@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Editar Exame</h2>

        <form action="{{ route('exames.update', $exame->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nome">Nome do Exame:</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ $exame->nome }}" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao" class="form-control" rows="4" required>{{ $exame->descricao }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Atualizar</button>
        </form>
    </div>
@endsection
