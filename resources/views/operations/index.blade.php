<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Histórico de Operações
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            @if ($operations->isEmpty())
                <p class="text-gray-600 dark:text-gray-300">Ainda não realizaste nenhuma operação.</p>
            @else
                <table class="min-w-full bg-white dark:bg-gray-800 shadow rounded">
                         <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-100">Tipo</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-100">Motivo</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-100">Valor</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700 dark:text-gray-100">Data</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($operations as $operation)
                        <tr class="{{ $loop->even ? 'bg-gray-50 dark:bg-gray-700' : 'bg-white dark:bg-gray-800' }}">
                            <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-100">{{ $operation->type }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-100">{{ $operation->reason }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-100">€ {{ number_format($operation->amount, 2, ',', '.') }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800 dark:text-gray-100">{{ $operation->created_at->format('d/m/Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>

                </table>
            @endif
        </div>
    </div>
</x-app-layout>
