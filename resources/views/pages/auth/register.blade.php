@extends('layouts.auth')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="bg-slate-200 p-5 flex flex-col w-96 rounded-lg gap-5">
            <h3 class="text-2xl font-bold text-center">Register</h3>
            <x-form.group actio="{{ route('auth.register.store') }}" method="POST">
                <x-form.textbox label="Username" name="name" placeholder="Username" required />
                @error('name')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                @enderror
                <x-form.textbox label="Email" type="email" name="email" placeholder="Email" required />
                @error('email')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                @enderror
                <div class="flex gap-3">
                    <div>
                        <x-form.textbox label="Password" type="password" name="password" placeholder="Password" required />
                        @error('password')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>
                    <div>
                        <x-form.textbox label="Kofirmasi Password" type="password" name="password_confirmation"
                            placeholder="Konfirmasi Password" required />
                        @error('password_confirmation')
                            <label class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </label>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-between items-center mt-5">
                    <span>Sudah punya akun? <a href="{{ route('auth.login.page') }}"
                            class="text-blue-400 font-bold">Login</a></span>
                    <button class="btn btn-info text-white">Register</button>
                </div>
            </x-form.group>
        </div>
    </div>
@endsection
