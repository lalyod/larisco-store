<x-modal.index title="Edit Kategori" id="categories_update">
    <x-form.group action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @method('PUT')
        <x-form.filebox label="Gambar" name="image" />
        <x-form.textbox label="Name" value="{{ $category->name }}" name="name" />
        <hr>
        <div class="flex justify-end mt-5">
            <button class="btn btn-info text-white">Edit</button>
        </div>
    </x-form.group>
</x-modal.index>
