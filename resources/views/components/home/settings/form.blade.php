<x-form.group>
    <div class="flex flex-col gap-5 mt-5">
        <div class="flex flex-col rounded-lg items-center">
            <div class="w-32 h-32 overflow-hidden rounded-full bg-slate-200">
                <img src="{{ Storage::url('public/users/' . $user->image) }}" alt="" class="w-44 h-44">
            </div>
            <span onclick="chooseImage('file-input')" class="btn btn-neutral mt-3">Pilih Gambar</span>
            <input type="file" id="file-input" name="image" value="text" placeholder="" class="hidden">
        </div>
        <div class="w-full">
            <x-form.textbox label="Name" value="{{ $user->name }}" name="name" />
            <div class="flex gap-5">
                <x-form.textbox label="Email" type="email" value="{{ $user->email }}" name="email" />
                <x-form.textbox label="Nomor Telepon" value="{{ $user->phone_number }}" name="name" />
            </div>
            @if (empty($user->address))
                <label class="label">Alamat</label>
                <x-modal.trigger text="+ Alamat Baru" modal="setting_address" class="w-full btn btn-info text-white" />
            @else
                <x-form.textarea label="Alamat" />
            @endif
        </div>
        <div>
            <label for="gender-radio" class="label">Jenis Kelamin</label>
            <div id="gender-radio" class="flex gap-5">
                <div class="flex items-center gap-3">
                    <input type="radio" id="man-radio" class="radio" value="laki-laki" name="gender">
                    <label for="man-radio">Laki-Laki</label>
                </div>
                <div class="flex items-center gap-3">
                    <input type="radio" id="man-radio" class="radio" value="perempuan" name="gender">
                    <label for="man-radio">Perempuan</label>
                </div>
            </div>
        </div>
        <div class="w-full">
            <label for="birth_date" class="label">Tanggal Lahir</label>
            <input type="date" id="birth_date" name="birth_date" class="input input-bordered w-full"
                value="{{ empty($user->birth_date) ? '' : $user->birth_date }}">
        </div>
    </div>
</x-form.group>
