<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Criar Produto
        </h2>
    </x-slot>

    <div class="py-4 px-6 max-w-4xl mx-auto">
        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="bg-white dark:bg-gray-800 p-6 rounded shadow">
            @csrf

            {{-- Select de categoria (dentro del formulario) --}}
            <div class="mb-4">
                <label for="category_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Categoria</label>
                <select name="category_id" id="category_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                            {{ $category->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Inputs del formulario --}}
            @include('admin.products.partials.form')

            <div class="flex justify-end mt-4">
                <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Cancelar</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Guardar</button>
            </div>
        </form>
    </div>
</x-app-layout>




