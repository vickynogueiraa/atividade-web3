<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MediConnect') }} - Confirmar Senha</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Nunito', sans-serif;
        }
        .confirm-container {
            max-width: 400px;
            margin-top: 50px;
        }
        .card {
            border-radius: 15px;
        }
        .card-header {
            background-color: #dc3545;
            color: white;
            text-align: center;
            font-size: 1.25rem;
            padding: 1rem;
        }
        .form-control:focus {
            border-color: #dc3545;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #bb2d3b;
            border-color: #bb2d3b;
        }
    </style>
</head>
<body>

<div class="container confirm-container">
    <div class="card shadow">
        <div class="card-header">
            {{ __('Confirme sua senha') }}
        </div>
        <div class="card-body p-4">
            <div class="mb-4 text-sm text-muted">
                {{ __('Esta é uma área segura da aplicação. Por favor, confirme sua senha antes de continuar.') }}
            </div>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <!-- Senha -->
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Senha') }}</label>
                    <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Botão de Confirmação -->
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-danger px-4">
                        {{ __('Confirmar') }}
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
