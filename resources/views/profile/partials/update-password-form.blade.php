<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Atualizar Senha</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
        .alert-success {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Atualizar Senha') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Certifique-se de que sua conta esteja usando uma senha longa e aleatória para manter a segurança.') }}
            </p>
        </header>

        <form method="post" action="{{ route('password.update') }}" class="mt-4">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="update_password_current_password" class="form-label">{{ __('Senha Atual:') }}</label>
                <input
                    id="update_password_current_password"
                    name="current_password"
                    type="password"
                    class="form-control"
                    autocomplete="current-password"
                />
                @error('current_password')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="update_password_password" class="form-label">{{ __('Nova Senha:') }}</label>
                <input
                    id="update_password_password"
                    name="password"
                    type="password"
                    class="form-control"
                    autocomplete="new-password"
                />
                @error('password')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="update_password_password_confirmation" class="form-label">{{ __('Confirmar Senha:') }}</label>
                <input
                    id="update_password_password_confirmation"
                    name="password_confirmation"
                    type="password"
                    class="form-control"
                    autocomplete="new-password"
                />
                @error('password_confirmation')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <button type="submit" class="btn btn-primary">
                    {{ __('Salvar') }}
                </button>

                @if (session('status') === 'password-updated')
                    <div
                        class="alert alert-success alert-dismissible fade show"
                        role="alert"
                    >
                        {{ __('Salvo.') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </form>
    </section>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
