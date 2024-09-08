@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Onformações do Exame</h2>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nome: {{ $exame->nome }}</h5>
                <p class="card-text">Descrição: {{ $exame->descricao }}</p>
            </div>
        </div>

        <a href="{{ route('exames.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
@endsection
