<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem de Entregas</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}"></script>
</head>

<body class="antialiased bg-gray-100 dark:bg-gray-900">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="max-w-7xl w-full px-6 py-8 bg-white dark:bg-gray-800 shadow-lg rounded-lg">
            <h2 class="text-3xl font-bold text-center mb-8 text-gray-800 dark:text-gray-100">Listagem de Entregas</h2>
            @if(session('success'))
            <script>
                Swal.fire({
                    title: 'Sucesso!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'OK',
                });
            </script>
            @endif

            <div class="text-center mb-8">
                <p class="text-gray-600 dark:text-gray-400">Bem-vindo, {{ Auth::user()->name }}!</p>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="text-indigo-600 hover:underline">Sair</button>
                </form>
            </div>

            <div class="mt-8 space-y-8">
                <form method="POST" action="{{ route('entregas') }}" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div>
                            <label for="transportadora_id" class="block text-sm font-semibold text-gray-600 dark:text-gray-300">Transportadora</label>
                            <select name="transportadora_id" id="transportadora_id" class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-gray-700 dark:text-gray-200">
                                <option value="">Selecione</option>
                                @foreach($transportadorasFilter as $transportadora)
                                <option value="{{ $transportadora->id }}" {{ old('transportadora_id', request()->get('transportadora_id')) == $transportadora->id ? 'selected' : '' }}>
                                    {{ $transportadora->fantasia }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="remetente" class="block text-sm font-semibold text-gray-600 dark:text-gray-300">Remetente</label>
                            <input type="text" name="remetente" id="remetente" class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-gray-700 dark:text-gray-200" value="{{ old('remetente', request()->get('remetente')) }}" placeholder="Nome do remetente">
                        </div>
                        <div>
                            <label for="destinatario" class="block text-sm font-semibold text-gray-600 dark:text-gray-300">Destinatário</label>
                            <input type="text" name="destinatario" id="destinatario" class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-gray-700 dark:text-gray-200" value="{{ old('destinatario', request()->get('destinatario')) }}" placeholder="Nome do destinatário">
                        </div>
                        <div>
                            <label for="cpf_destinatario" class="block text-sm font-semibold text-gray-600 dark:text-gray-300">CPF Destinatário</label>
                            <input type="text" name="cpf_destinatario" id="cpf_destinatario" class="w-full p-3 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-600 dark:bg-gray-700 dark:text-gray-200" value="{{ old('cpf_destinatario', request()->get('cpf_destinatario')) }}" placeholder="CPF do destinatário">
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="reset" class="px-6 py-3 bg-gray-400 text-white text-lg rounded-md hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-400">
                            Limpar
                        </button>
                        <button type="submit" class="px-8 py-4 bg-blue-600 text-white text-lg rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600">
                            Filtrar
                        </button>
                    </div>
                </form>



                <h3 class="text-2xl font-semibold mb-4 text-gray-800 dark:text-gray-100">Listagem de Entregas</h3>

                <!-- Tabela de entregas -->
                @foreach ($transportadoras as $transportadora)
                <div class="space-y-4">
                    <h4 class="text-xl font-semibold mt-4 text-gray-700 dark:text-gray-200">{{ $transportadora->fantasia }}</h4>
                    <table class="min-w-full table-fixed bg-white dark:bg-gray-700 rounded-lg shadow-md">
                        <thead>
                            <tr>
                                <th class="w-1/4 px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                    Remetente
                                </th>
                                <th class="w-1/4 px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                    Destinatário
                                </th>
                                <th class="w-1/4 px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                    Endereço
                                </th>
                                <th class="w-1/4 px-6 py-3 text-left text-sm font-medium text-gray-600 dark:text-gray-300">
                                    CPF Destinatário
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($transportadora->entregas->isNotEmpty())
                            @foreach ($transportadora->entregas as $entrega)
                            <?php
                            $remetente = json_decode($entrega->remetente);
                            $destinatario = json_decode($entrega->destinatario);
                            ?>
                            <tr onclick="window.location.href='{{ route('entregas.show', ['entrega' => $entrega->id]) }}'" class="hover:bg-gray-100 dark:hover:bg-gray-800 cursor-pointer">
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">
                                    {{ $remetente->nome ?? 'N/A' }}
                                </td>

                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">
                                    {{ $destinatario->nome ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">
                                    {{ $destinatario->cep ?? 'N/A' }}
                                    {{ $destinatario->endereco ?? 'N/A' }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-300">
                                    {{ $destinatario->cpf ?? 'N/A' }}
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="10" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                    Nenhuma entrega vinculada a esta transportadora.
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
<script>
    document.getElementById('cpf_destinatario').addEventListener('input', function(e) {
        let input = e.target.value;
        input = input.replace(/\D/g, '');
        if (input.length > 11) {
            input = input.substring(0, 11);
        }
        input = input.replace(/(\d{3})(\d{3})(\d{3})(\d{1,2})/, '$1.$2.$3-$4');

        e.target.value = input;
    });
    document.querySelector('button[type="reset"]').addEventListener('click', function(event) {
        window.location.href = '{{ route("entregas") }}';
    });
</script>

</html>
