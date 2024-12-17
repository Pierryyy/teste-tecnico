<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Exibir Transportadoras</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased bg-gray-100 dark:bg-gray-900">
    <div class="flex items-center justify-center min-h-screen">
        <div class="max-w-md w-full px-6 py-8 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
            <h2 class="text-2xl font-bold text-center mb-5 text-gray-800 dark:text-gray-100">Login</h2>
            <!-- Exibir o SweetAlert se houver uma mensagem de sucesso -->
            @if (session('success'))
            <script>
                Swal.fire({
                    title: 'Sucesso!',
                    text: '{{ session("success") }}',
                    icon: 'success',
                    confirmButtonText: 'OK',
                });
            </script>
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf <!-- Proteção contra CSRF -->

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="w-full px-3 py-2 rounded-md bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-200 border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="example@example.com"
                        required
                        value="{{ old('email') }}" /> <!-- Mantém o valor do campo em caso de erro de validação -->

                    @error('email') <!-- Exibe erro de validação -->
                    <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Senha</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="w-full px-3 py-2 rounded-md bg-gray-100 dark:bg-gray-700 text-gray-900 dark:text-gray-200 border border-gray-300 dark:border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        placeholder="********"
                        required />

                    @error('password') <!-- Exibe erro de validação -->
                    <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center">
                        <input
                            type="checkbox"
                            id="remember"
                            name="remember"
                            class="rounded text-indigo-600 focus:ring-indigo-500" />
                        <label for="remember" class="ml-2 text-sm text-gray-600 dark:text-gray-400">Lembrar-me</label>
                    </div>
                    <a href="" class="text-sm text-indigo-600 hover:text-indigo-700">Esqueceu sua senha?</a>
                </div>

                <div class="mb-3">
                    <button
                        type="submit"
                        class="w-full py-2 px-4 rounded-md font-semibold text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Entrar
                    </button>
                </div>
            </form>
            <!-- Register Link -->
            <p class="text-sm text-center text-gray-600 dark:text-gray-400">
                Não tem uma conta? <a href="register" class="text-indigo-600 hover:underline">Registre-se</a>
            </p>
        </div>
    </div>
</body>

</html>