<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Lista de Produtos
        </h2>
    </x-slot>

    <div class="py-4 px-6">
        <a href="{{ route('products.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
            Novo Produto
        </a>

        <table class="table-auto w-full mt-6 bg-white shadow rounded">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2">Nome</th>
                    <th class="px-4 py-2">Preço (€)</th>
                    <th class="px-4 py-2">Stock</th>
                    <th class="px-4 py-2">Categoria</th>
                    <th class="px-4 py-2">Imagem</th> {{-- ← Nueva columna --}}
                    <th class="px-4 py-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $product->nome }}</td>
                        <td class="px-4 py-2">{{ $product->preco }}</td>
                        <td class="px-4 py-2">{{ $product->stock }}</td>
                        <td class="px-4 py-2">{{ $product->category?->nome ?? 'Sem categoria' }}</td>
                        <td class="px-4 py-2">
                            @if($product->imagem)
                                <img src="{{ asset('storage/' . $product->imagem) }}" alt="Imagem" class="w-16 h-16 object-cover rounded">
                            @else
                                <span class="text-sm text-gray-400">Sem imagem</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 flex space-x-2">
                            <a href="{{ route('products.edit', $product) }}" class="text-blue-500 hover:underline">Editar</a>
                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Tens a certeza?')" class="text-red-500 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>


