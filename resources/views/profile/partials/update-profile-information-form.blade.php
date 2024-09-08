<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Informações do Perfil</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
    </style>
</head>
<body>
<div class="container">
    <section>
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Informações do Perfil') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __("Atualize as informações do seu perfil e endereço de e-mail.") }}
            </p>
        </header>

        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>

        <form method="post" action="{{ route('profile.update') }}" class="mt-4">
            @csrf
            @method('patch')

            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Nome') }}</label>
                <input
                    id="name"
                    name="name"
                    type="text"
                    class="form-control"
                    :value="old('name', $user->name)"
                    required
                    autofocus
                    autocomplete="name"
                />
                @error('name')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    class="form-control"
                    :value="old('email', $user->email)"
                    required
                    autocomplete="username"
                />
                @error('email')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-3">
                        <p class="text-sm text-gray-800">
                            {{ __('Seu endereço de e-mail não está verificado.') }}

                            <button
                                form="send-verification"
                                class="btn btn-link p-0 text-primary"
                                type="submit"
                            >
                                {{ __('Clique aqui para reenviar o e-mail de verificação.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 text-success">
                                {{ __('Um novo link de verificação foi enviado para o seu endereço de e-mail.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <button type="submit" class="btn btn-primary">
                    {{ __('Salvar') }}
                </button>

                @if (session('status') === 'profile-updated')
                    <p
                        class="text-success"
                        role="alert"
                    >{{ __('Salvo.') }}</p>
                @endif
            </div>
        </form>
    </section>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
