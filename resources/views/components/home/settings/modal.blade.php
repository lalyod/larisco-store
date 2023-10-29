<x-modal.index id="setting_address" title="Alamat">
    <x-form.group action="{{ route('settings.store.address') }}" method="POST">
        <div class="flex gap-5 items-center">
            <x-form.textbox label="Nama Lengkap" name="fullname" placeholder="Nama Lengkap" required />
            <x-form.textbox type="number" label="Nomor Telepon" name="phone_number" placeholder="Nomor Telepon"
                required />
        </div>
        <x-form.selectbox label="Provinsi" id="provinces" onchange="select('provinces','regencies','Kabupaten')">
            <option value="" disabled selected>Pilih Provinsi</option>
            @foreach ($provinces as $province)
                <option value="{{ $province['province_id'] }}">{{ $province['province'] }}</option>
            @endforeach
        </x-form.selectbox>
        <x-form.selectbox label="Kabupaten" id="regencies" name="city" disabled>
            <option value="" disabled selected>Pilih Kabupaten</option>
        </x-form.selectbox>
        <x-form.textbox label="Detail lainnya" name="details" placeholder="Detail lainnya (Cth: Blok / Unit No.Patokan)"
            required />
        <input type="hidden" name="province" id="input_province">
        <input type="hidden" name="postal_code" id="postal_code">
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <hr>
        <div class="flex justify-end mt-4">
            <button class="btn btn-info text-white">Tambah</button>
        </div>
    </x-form.group>
</x-modal.index>
