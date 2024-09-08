<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MediConnect') }} - Verificação de Email</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
          
            font-family: 'Nunito', sans-serif;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
        }
        .alert-success {
            background-color: #d4edda; /* Success background color */
            color: #155724; /* Success text color */
            border-color: #c3e6cb; /* Success border color */
        }
        .btn-primary {
            background-color: #007bff; /* Primary color */
            border-color: #007bff; /* Primary color */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker shade of primary color */
            border-color: #004085; /* Darker shade of primary color */
        }
        .text-gray-600 {
            color: #6c757d; /* Gray text color */
        }
    </style>
</head>
<body>

<div class="container">
    <div class="alert alert-info" role="alert">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success" role="alert">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 d-flex justify-content-between align-items-center">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <button type="submit" class="btn btn-primary">
                {{ __('Resend Verification Email') }}
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="btn btn-link text-gray-600">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
