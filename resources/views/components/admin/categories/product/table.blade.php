<x-table :columns="['', 'Gambar', 'Nama', 'Aksi']">
    @forelse ($products as $key => $product)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>
                <img src="{{ Storage::url('public/products/' . $product->image) }}" alt="{{ $product->image }}" class="w-12 h-12 rounded-lg object-contain">
            </td>
            <td>{{ $product->name }}</td>
            <td>
                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-info text-white">Detail</a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="100%" class="text-center">Data tidak ditemukan</td>
        </tr>
    @endforelse
</x-table>
