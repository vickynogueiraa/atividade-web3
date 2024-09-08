<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>MediConnect - Painel</title>

       
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

      
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-light">
        <div class="min-vh-100 bg-light">
            @include('layouts.navigation')

          
            <main>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                <h3 class="text-lg font-semibold mb-4">Bem-vindo ao Painel de Controle</h3>

                                
                                <p>{{ __("Você está logado!") }}</p>

                                <!-- Links para as principais seções -->
                                <div class="mt-6">
                                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <!-- Link para Médicos -->
                                        <div class="p-4 bg-blue-100 rounded-lg shadow-md">
                                            <h4 class="text-md font-semibold">Médicos</h4>
                                            <p class="mt-2 text-gray-700">Gerencie os médicos cadastrados no sistema.</p>
                                            <a href="{{ route('medicos.index') }}" class="text-blue-500 hover:underline">Ver Médicos</a>
                                        </div>

                                        <!-- Link para Pacientes -->
                                        <div class="p-4 bg-green-100 rounded-lg shadow-md">
                                            <h4 class="text-md font-semibold">Pacientes</h4>
                                            <p class="mt-2 text-gray-700">Gerencie os pacientes cadastrados no sistema.</p>
                                            <a href="{{ route('pacientes.index') }}" class="text-blue-500 hover:underline">Ver Pacientes</a>
                                        </div>

                                        <!-- Link para Consultas -->
                                        <div class="p-4 bg-yellow-100 rounded-lg shadow-md">
                                            <h4 class="text-md font-semibold">Consultas</h4>
                                            <p class="mt-2 text-gray-700">Visualize e gerencie as consultas agendadas.</p>
                                            <a href="{{ route('consultas.index') }}" class="text-blue-500 hover:underline">Ver Consultas</a>
                                        </div>

                                        <!-- Link para Prontuários -->
                                        <div class="p-4 bg-red-100 rounded-lg shadow-md">
                                            <h4 class="text-md font-semibold">Prontuários</h4>
                                            <p class="mt-2 text-gray-700">Acesse e gerencie os prontuários dos pacientes.</p>
                                            <a href="{{ route('prontuarios.index') }}" class="text-blue-500 hover:underline">Ver Prontuários</a>
                                        </div>

                                        

                                        <!-- Link para Exames -->
                                        <div class="p-4 bg-indigo-100 rounded-lg shadow-md">
                                            <h4 class="text-md font-semibold">Exames</h4>
                                            <p class="mt-2 text-gray-700">Acesse e gerencie os exames disponíveis.</p>
                                            <a href="{{ route('exames.index') }}" class="text-blue-500 hover:underline">Ver Exames</a>
                                        </div>

                                        <!-- Link para Medicamentos -->
                                        <div class="p-4 bg-gray-100 rounded-lg shadow-md">
                                            <h4 class="text-md font-semibold">Medicamentos</h4>
                                            <p class="mt-2 text-gray-700">Gerencie os medicamentos disponíveis no sistema.</p>
                                            <a href="{{ route('medicamentos.index') }}" class="text-blue-500 hover:underline">Ver Medicamentos</a>
                                        </div>

                                        <!-- Link para Prescrições -->
                                        <div class="p-4 bg-pink-100 rounded-lg shadow-md">
                                            <h4 class="text-md font-semibold">Prescrições</h4>
                                            <p class="mt-2 text-gray-700">Visualize e gerencie as prescrições feitas.</p>
                                            <a href="{{ route('prescricoes.index') }}" class="text-blue-500 hover:underline">Ver Prescrições</a>
                                        </div>

                                        <!-- Link para Farmácias -->
                                        <div class="p-4 bg-teal-100 rounded-lg shadow-md">
                                            <h4 class="text-md font-semibold">Farmácias</h4>
                                            <p class="mt-2 text-gray-700">Acesse informações sobre as farmácias.</p>
                                            <a href="{{ route('farmacias.index') }}" class="text-blue-500 hover:underline">Ver Farmácias</a>
                                        </div>

                                        <!-- Link para Medicamentos nas Farmácias -->
                                        <div class="p-4 bg-yellow-100 rounded-lg shadow-md">
                                            <h4 class="text-md font-semibold">Medicamentos nas Farmácias</h4>
                                            <p class="mt-2 text-gray-700">Gerencie a disponibilidade de medicamentos nas farmácias.</p>
                                            <a href="{{ route('medicamentos_farmacia.index') }}" class="text-blue-500 hover:underline">Ver Medicamentos nas Farmácias</a>
                                        </div>

                                        <!-- Link para Pedidos -->
                                        <div class="p-4 bg-indigo-100 rounded-lg shadow-md">
                                            <h4 class="text-md font-semibold">Pedidos</h4>
                                            <p class="mt-2 text-gray-700">Visualize e gerencie os pedidos realizados.</p>
                                            <a href="{{ route('pedidos.index') }}" class="text-blue-500 hover:underline">Ver Pedidos</a>
                                        </div>

                                        <!-- Link para Histórico de Medicamentos -->
                                        <div class="p-4 bg-blue-100 rounded-lg shadow-md">
                                            <h4 class="text-md font-semibold">Histórico de Medicamentos</h4>
                                            <p class="mt-2 text-gray-700">Acesse o histórico de medicamentos comprados pelos pacientes.</p>
                                            <a href="{{ route('historico_medicamentos.index') }}" class="text-blue-500 hover:underline">Ver Histórico</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    </body>
</html>
