<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes da Entrega</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}"></script>
</head>

<body class="antialiased bg-gray-100 dark:bg-gray-900">

    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="max-w-4xl w-full px-6 py-8 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
            <h2 class="text-3xl font-bold text-center mb-8 text-gray-800 dark:text-gray-100">Detalhes da Entrega</h2>
            <?php
            $remetente = json_decode($entrega->remetente);
            $destinatario = json_decode($entrega->destinatario);
            $rastreamento = json_decode($entrega->rastreamento);
            ?>
            <div class="space-y-6">
                <div>
                    <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Entrega de: {{ $remetente->nome}}</h3>
                    <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-100">Para: {{ $destinatario->nome }}</h3>
                </div>
                <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-md">
                    <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">Destinatário</h4>
                    <p class="text-gray-600 dark:text-gray-400">Nome: {{ $destinatario->nome ?? 'N/A' }}</p>
                    <p class="text-gray-600 dark:text-gray-400">Endereço: {{ $destinatario->endereco ?? 'N/A' }}</p>
                    <p class="text-gray-600 dark:text-gray-400">CEP: {{ $destinatario->cep ?? 'N/A' }}</p>
                    <p class="text-gray-600 dark:text-gray-400">CPF: {{ $destinatario->cpf ?? 'N/A' }}</p>
                </div>

                <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-md">
                    <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-100 mb-4">Detalhes da Entrega</h4>
                    <p class="text-gray-600 dark:text-gray-400">Volumes: {{ $entrega->volumes ?? 'N/A' }}</p>

                    <!-- Iterando sobre os rastreamentos -->
                    @foreach($rastreamento as $rastreio)
                    <div class="mt-4">
                        <p class="text-gray-600 dark:text-gray-400">
                            <strong>Data:</strong> {{ $rastreio->date }}
                        </p>
                        <p class="text-gray-600 dark:text-gray-400">
                            <strong>Mensagem:</strong> {{ $rastreio->message }}
                        </p>
                    </div>
                    @endforeach
                </div>
                <div class="text-center">
                    <a href="{{ route('entregas') }}" class="px-8 py-4 bg-blue-600 text-white text-lg rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600">
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
