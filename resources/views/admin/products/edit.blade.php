<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar Produto
        </h2>
    </x-slot>

    <div class="py-4 px-6">
        <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

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


            @include('admin.products.partials.form')

            <div>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                    Atualizar Produto
                </button>
            </div>
        </form>
    </div>
</x-app-layout>

