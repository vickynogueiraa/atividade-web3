<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>MediConnect</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-dark bg-light">
        <div class="min-vh-100 d-flex flex-column justify-content-center align-items-center pt-5 bg-light">
            <div>
                <a href="/">
                    <img src="/path/to/logo.png" class="img-fluid" alt="Logo" style="width: 80px; height: 80px;">
                </a>
            </div>

            <div class="w-100 mt-4 px-4 py-4 bg-white shadow rounded-3" style="max-width: 400px;">
                {{ $slot }}
            </div>
        </div>

        <!-- Bootstrap JS (with Popper) -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    </body>
</html>
