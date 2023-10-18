<x-table :columns="['', 'Image', 'Name', 'Aksi']">
    @forelse ($categories as $key => $category)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>
                <img src="{{ Storage::url('public/categories/') . $category->image }}" alt=""
                    class="w-12 h-12 rounded-lg object-contain">
            </td>
            <td>{{ $category->name }}</td>
            <td class="flex gap-2">
                <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-info text-white">Detail</a>
                <x-form.delete-button text="Delete" action="{{ route('admin.categories.destroy', $category->id) }}" />
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="100%" class="text-center">
                Data tidak ditemukan
            </td>
        </tr>
    @endforelse
</x-table>
