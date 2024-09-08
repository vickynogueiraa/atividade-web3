<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MediConnect') }} - Criar Conta</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
           
            font-family: 'Nunito', sans-serif;
        }
        .register-container {
            max-width: 500px;
            margin: 50px auto;
        }
        .card {
            border-radius: 15px;
            border: 1px solid #f8d7da; /* Warning border color */
        }
        .card-header {
            background-color: #ffc107; /* Warning color */
            color: black;
            text-align: center;
            font-size: 1.25rem;
            padding: 1rem;
        }
        .form-control:focus {
            border-color: #ffc107; /* Warning color for focus state */
            box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25); /* Warning shadow color */
        }
        .btn-primary {
            background-color: #ffc107; /* Warning color */
            border-color: #ffc107; /* Warning color */
        }
        .btn-primary:hover {
            background-color: #e0a800; /* Darker shade of warning color */
            border-color: #d39e00; /* Darker shade of warning color */
        }
    </style>
</head>
<body>

<div class="container register-container">
    <div class="card shadow">
        <div class="card-header">
            {{ __('Cadastro') }}
        </div>
        <div class="card-body p-4">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nome -->
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Nome') }}</label>
                    <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Endereço de Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('E-mail') }}</label>
                    <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Senha -->
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Senha') }}</label>
                    <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Confirmar Senha -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">{{ __('Confirmar Senha') }}</label>
                    <input id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" required autocomplete="new-password">
                    @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a class="text-decoration-none" href="{{ route('login') }}">
                        {{ __('Já registrado?') }}
                    </a>

                    <button type="submit" class="btn btn-primary">
                        {{ __('Cadastrar') }}
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
