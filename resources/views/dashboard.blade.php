<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Painel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (Auth::user()->tipo === 'pending_member')
                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-6 rounded mb-4">
                    <p class="text-lg">⚠️ A tua conta ainda não está ativada.</p>
                    <p class="mt-2">Para aceder ao Grocery Club, precisas pagar a tua quota de adesão.</p>
                    <a href="{{ route('payment.form') }}" class="mt-4 inline-block bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
                        💳 Pagar quota de adesão
                    </a>
                </div>
            @else
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-6 rounded mb-4">
                    <p class="text-lg">✅ Bem-vindo(a) ao Grocery Club, {{ Auth::user()->name }}!</p>
                    <p class="mt-2">A tua conta está ativa. Obrigado por fazeres parte da nossa comunidade 🍓</p>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
