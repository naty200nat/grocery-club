<div class="grid grid-cols-1 gap-4">
    <label>
        Nome:
        <input type="text" name="nome" value="{{ old('nome', $product->nome ?? '') }}" class="w-full border rounded px-2 py-1">
    </label>

    <label>
        Descrição:
        <textarea name="descricao" class="w-full border rounded px-2 py-1">{{ old('descricao', $product->descricao ?? '') }}</textarea>
    </label>

    <label>
        Preço (€):
        <input type="number" step="0.01" name="preco" value="{{ old('preco', $product->preco ?? '') }}" class="w-full border rounded px-2 py-1">
    </label>

    <label>
        Stock:
        <input type="number" name="stock" value="{{ old('stock', $product->stock ?? '') }}" class="w-full border rounded px-2 py-1">
    </label>

    <label>
        Imagem:
        <input type="file" name="imagem" class="w-full border rounded px-2 py-1">
    </label>
</div>
