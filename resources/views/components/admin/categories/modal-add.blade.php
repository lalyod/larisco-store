<x-modal.index title="Tambah Kategori">
    <x-form.group action="{{ route('admin.categories.store') }}" method="POST" >
        <x-form.filebox label="Image" name="image"/>
        <x-form.textbox label="Nama" placeholder="Nama" name="name" />
        <hr>
        <div class="flex justify-end">
            <button class="btn btn-success text-white mt-4">Tambah</button>
        </div>
    </x-form.group>
</x-modal.index>
