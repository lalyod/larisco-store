<x-modal.index title="Edit Produk" id="products_edit">
    <x-form.group action="{{ route('admin.products.update', $product->id) }}" method="POST">
        @method('PUT')
        <x-form.filebox label="Gambar" name="image" />
        <div class="flex justify-between gap-4">
            <x-form.textbox label="Nama" name="name" placeholder="Nama" value="{{ $product->name }}" />
            <x-form.textbox label="Harga" type="number" name="price" placeholder="Harga"
                value="{{ $product->price }}" />
        </div>
        <div class="flex justify-between gap-4">
            <x-form.textbox label="Stok" type="number" name="stock" placeholder="Stok"
                value="{{ $product->stock }}" />
            <x-form.selectbox label="Kategori" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $product->category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </x-form.selectbox>
        </div>
        <x-form.textarea label="Deskripsi" name="description"
            placeholder="Deskripsi">{{ $product->description }}</x-form.textarea>
        <hr class="mt-5">
        <div class="flex justify-end mt-5">
            <button class="btn btn-info text-white">Edit</button>
        </div>
    </x-form.group>
</x-modal.index>
