<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Activar cuenta con pago de membresía') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
                @if (session('error'))
                    <div class="mb-4 text-red-600 dark:text-red-400">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('payment.process') }}">
                    @csrf

                    <!-- Método de Pago -->
                    <div class="mb-4">
                        <label for="metodo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Método de pago</label>
                        <select id="metodo" name="metodo" class="mt-1 block w-full rounded-md dark:bg-gray-700 dark:text-white">
                            <option value="visa">Visa</option>
                            <option value="paypal">PayPal</option>
                            <option value="mbway">MB WAY</option>
                        </select>
                    </div>

                    <!-- Referencia -->
                    <div class="mb-4">
                        <label for="referencia" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Referencia</label>
                        <input type="text" id="referencia" name="referencia" class="mt-1 block w-full rounded-md dark:bg-gray-700 dark:text-white" required>
                        <p id="referenciaInfo" class="text-xs mt-1 text-gray-600 dark:text-gray-400">Ingrese el número de tarjeta, correo o teléfono, según el método.</p>
                    </div>

                    <!-- CVC para Visa -->
                    <div class="mb-4 hidden" id="cvcField">
                        <label for="cvc" class="block text-sm font-medium text-gray-700 dark:text-gray-300">CVC (Visa)</label>
                        <input type="text" id="cvc" name="cvc" maxlength="3" class="mt-1 block w-full rounded-md dark:bg-gray-700 dark:text-white">
                    </div>

                    <!-- Botón -->
                    <div>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 disabled:opacity-50">
                            Pagar y Activar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script para mostrar campos dinámicamente -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const metodo = document.getElementById('metodo');
            const referencia = document.getElementById('referencia');
            const cvcField = document.getElementById('cvcField');
            const referenciaInfo = document.getElementById('referenciaInfo');

            function updateFields() {
                if (metodo.value === 'visa') {
                    referencia.placeholder = 'Número de tarjeta (16 dígitos)';
                    referenciaInfo.textContent = 'Ingrese el número de 16 dígitos de su tarjeta Visa.';
                    cvcField.classList.remove('hidden');
                } else if (metodo.value === 'paypal') {
                    referencia.placeholder = 'Correo electrónico de PayPal';
                    referenciaInfo.textContent = 'Ingrese su email asociado a PayPal.';
                    cvcField.classList.add('hidden');
                } else if (metodo.value === 'mbway') {
                    referencia.placeholder = 'Número móvil (empieza en 9)';
                    referenciaInfo.textContent = 'Ingrese su número de teléfono portugués (9 dígitos).';
                    cvcField.classList.add('hidden');
                }
            }

            metodo.addEventListener('change', updateFields);
            updateFields();
        });
    </script>
</x-app-layout>
