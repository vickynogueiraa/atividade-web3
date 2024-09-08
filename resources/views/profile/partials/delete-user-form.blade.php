<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Excluir Conta</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        .modal-content {
            border-radius: 15px;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <section class="space-y-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Excluir Conta') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Uma vez que sua conta for excluída, todos os seus recursos e dados serão permanentemente excluídos. Antes de excluir sua conta, faça o download de quaisquer dados ou informações que você deseja manter.') }}
            </p>
        </header>

        <button
            type="button"
            class="btn btn-danger"
            data-bs-toggle="modal"
            data-bs-target="#confirmUserDeletionModal"
        >
            {{ __('Excluir Conta') }}
        </button>

        <!-- Modal -->
        <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="{{ route('profile.destroy') }}">
                        @csrf
                        @method('delete')

                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmUserDeletionModalLabel">
                                {{ __('Você tem certeza de que deseja excluir sua conta?') }}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <p class="text-sm text-gray-600">
                                {{ __('Uma vez que sua conta for excluída, todos os seus recursos e dados serão permanentemente excluídos. Por favor, digite sua senha para confirmar que você deseja excluir sua conta permanentemente.') }}
                            </p>

                            <div class="mt-3">
                                <label for="password" class="form-label">{{ __('Senha') }}</label>
                                <input
                                    id="password"
                                    name="password"
                                    type="password"
                                    class="form-control"
                                    placeholder="{{ __('Senha') }}"
                                    required
                                >
                                @error('password')
                                    <div class="text-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                {{ __('Cancelar') }}
                            </button>
                            <button type="submit" class="btn btn-danger">
                                {{ __('Excluir Conta') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
