<x-modal.index title="Tambah Produk" id="products_add">
    <x-form.group action="{{ route('admin.products.store') }}" method="POST">
        <x-form.filebox label="Gambar" name="image" required />
        <div class="flex justify-between gap-4">
            <x-form.textbox label="Nama" name="name" placeholder="Nama" required />
            <x-form.textbox label="Harga" type="number" name="price" placeholder="Harga" required />
        </div>
        <div class="flex justify-between gap-4">
            <x-form.textbox label="Stok" type="number" name="stock" placeholder="Stok" required />
            <x-form.selectbox label="Kategori" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </x-form.selectbox>
        </div>
        <x-form.textarea label="Deskripsi" name="description" placeholder="Deskripsi" />
        <hr class="mt-5">
        <div class="flex justify-end mt-5">
            <button class="btn btn-info text-white">Tambah</button>
        </div>
    </x-form.group>
</x-modal.index>
