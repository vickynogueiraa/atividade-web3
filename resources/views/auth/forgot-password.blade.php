<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MediConnect') }} - Redefinir Senha</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Nunito', sans-serif;
        }
        .reset-container {
            max-width: 500px;
            margin-top: 50px;
        }
        .card {
            border-radius: 15px;
        }
        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            font-size: 1.25rem;
            padding: 1rem;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>
<body>

<div class="container reset-container">
    <div class="card shadow">
        <div class="card-header">
            {{ __('Redefinir Senha') }}
        </div>
        <div class="card-body p-4">
            <div class="mb-4 text-sm text-muted">
                {{ __('Esqueceu sua senha? Sem problemas. Basta informar seu endereço de e-mail e enviaremos um link de redefinição de senha que permitirá escolher uma nova.') }}
            </div>

            <!-- Status da Sessão -->
            @if (session('status'))
                <div class="alert alert-success mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Endereço de Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('E-mail') }}</label>
                    <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Botão de Envio -->
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Enviar Link de Redefinição de Senha') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
