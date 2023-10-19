<x-modal.index id="setting_address" title="Alamat">
    <x-form.group>
        <x-form.selectbox label="Provinsi" id="provinces" onchange="select('provinces','regencies','Kabupaten')">
            <option value="" disabled selected>Pilih Provinsi</option>
            @foreach ($provinces as $province)
                <option value="{{ $province->id }}">{{ $province->name }}</option>
            @endforeach
        </x-form.selectbox>
        <x-form.selectbox label="Kabupaten" id="regencies" onchange="select('regencies','districs','Kecamatan')">
            <option value="" disabled selected>Pilih Kabupaten</option>
        </x-form.selectbox>
        <x-form.selectbox label="Kecamatan" id="districs" onchange="select('districs','villages','Desa')">
            <option value="" disabled selected>Pilih Kecamatan</option>
        </x-form.selectbox>
        <x-form.selectbox label="Desa" id="villages">
            <option value="" disabled selected>Pilih Desa</option>
        </x-form.selectbox>
        <hr>
        <div class="flex justify-end mt-4">
            <button class="btn btn-info text-white">Tambah</button>
        </div>
    </x-form.group>
</x-modal.index>
