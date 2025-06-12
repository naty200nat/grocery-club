<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cartão do Membro e Pagamento') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">

            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4">Recarregar cartão virtual</h3>

            @if (session('success'))
                <div class="mb-4 text-green-600 dark:text-green-400">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('payment.process') }}">
                @csrf

                <!-- Valor -->
                <div class="mb-4">
                    <label for="amount" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Valor (€)</label>
                    <input type="number" name="amount" id="amount" required step="0.01" min="0"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white" />
                </div>

                <!-- Método de pagamento -->
                <div class="mb-4">
                    <label for="method" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Método de pagamento</label>
                    <select name="method" id="method" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white">
                        <option value="">Selecione...</option>
                        <option value="visa">Visa</option>
                        <option value="paypal">PayPal</option>
                        <option value="mbway">MB WAY</option>
                    </select>
                </div>

                <!-- Referência do pagamento (ex: número do cartão, email ou telefone) -->
                <div class="mb-4">
                    <label for="reference" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Referência</label>
                    <input type="text" name="reference" id="reference" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:text-white" />
                </div>

                <!-- Botão de submissão -->
                <div class="flex justify-center mt-6">
                   <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded">
                        Confirmar pagamento
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
