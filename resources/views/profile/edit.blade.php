<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MediConnect') }} - @yield('title', 'Perfil')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil') }}
        </h2>
    </div>

    <div class="py-12">
        <div class="container">
            <div class="row g-4">
                <!-- Atualizar Informações do Perfil -->
                <div class="col-lg-6">
                    <div class="p-4 bg-white shadow rounded-lg">
                        <h3 class="text-lg font-semibold mb-4">Atualizar Informações do Perfil</h3>
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>

                <!-- Atualizar Senha -->
                <div class="col-lg-6">
                    <div class="p-4 bg-white shadow rounded-lg">
                        <h3 class="text-lg font-semibold mb-4">Atualizar Senha</h3>
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>

                <!-- Deletar Conta -->
                <div class="col-lg-6">
                    <div class="p-4 bg-white shadow rounded-lg">
                        <h3 class="text-lg font-semibold mb-4">Deletar Conta</h3>
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
