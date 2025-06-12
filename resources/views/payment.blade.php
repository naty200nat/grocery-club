<x-app-layout>
    <h2 class="text-xl font-bold mb-4">Activar cuenta con pago de membresía</h2>

    <form method="POST" action="{{ route('payment.process') }}">
        @csrf

        <div class="mb-4">
            <label for="method">Método de pago:</label>
            <select name="method" class="w-full">
                <option value="Visa">Visa</option>
                <option value="PayPal">PayPal</option>
                <option value="MB WAY">MB WAY</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="reference">Referencia:</label>
            <input type="text" name="reference" class="w-full" required>
        </div>

        <button class="bg-blue-500 text-white px-4 py-2 rounded">Pagar y Activar</button>
    </form>
</x-app-layout>
