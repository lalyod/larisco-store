<x-form.group action="{{ route('settings.update.user') }}" method="POST" id="main-form">
    @method('PUT')
    <div class="flex flex-col gap-5 mt-5">
        <div class="flex flex-col rounded-lg items-center">
            <div class="w-32 h-32 overflow-hidden rounded-full bg-slate-200">
                <img src="{{ Storage::url('public/users/' . $user->image) }}" alt=""
                    class="w-32 h-32 object-cover">
            </div>
            <span onclick="chooseImage('file-input')" class="btn btn-neutral mt-3">Pilih Gambar</span>
            <input type="file" id="file-input" name="image" value="" onchange="submit('main-form')"
                placeholder="" class="hidden">
        </div>
        <div class="w-full">
            <x-form.textbox label="Name" value="{{ $user->name }}" name="name" />
            <div class="flex gap-5 max-sm:flex-col">
                <x-form.textbox label="Email" type="email" value="{{ $user->email }}" name="email" />
                <x-form.textbox label="Nomor Telepon" type="number" value="{{ $user->phone_number }}"
                    name="phone_number" />
            </div>
            @if (empty($user->address))
                <label class="label">Alamat</label>
                <x-modal.trigger text="+ Alamat Baru" modal="setting_address" class="w-full btn btn-info text-white" />
            @else
                <x-form.textarea label="Alamat" name="address">
                    {{ $user->address }}
                </x-form.textarea>
            @endif
        </div>
        <div>
            <label for="gender-radio" class="label">Jenis Kelamin</label>
            <div id="gender-radio" class="flex gap-5">
                <div class="flex items-center gap-3">
                    <input type="radio" id="" name="gender" value="laki-laki"
                        {{ $user->gender == 'laki-laki' ? 'checked' : '' }}>
                    <label for="">Laki-laki</label>
                </div>
                <div class="flex items-center gap-3">
                    <input type="radio" id="" name="gender" value="perempuan"
                        {{ $user->gender == 'perempuan' ? 'checked' : '' }}>
                    <label for="">Perempuan</label>
                </div>
            </div>
        </div>
        <x-form.datebox label="Tanggal Lahir" name="birth_date"
            value="{{ empty($user->birth_date) ? '' : $user->birth_date }}" />
    </div>
    <div class="flex justify-end mt-5">
        <button type="submit" form="main-form" class="btn btn-info text-white">Save</button>
    </div>
</x-form.group>
