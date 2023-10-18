@extends('layouts.auth')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="bg-slate-200 flex flex-col gap-4 p-5 rounded-lg w-96">
            <h3 class="text-2xl font-bold text-center">Login</h3>
            <x-form.group action="{{ route('auth.login.store') }}" method="POST">
                <x-form.textbox label="Username" name="name" required />
                @error('name')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                @enderror
                <x-form.textbox label="Password" name="password" required type="password" />
                @error('password')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                @enderror
                <div class="flex items-center justify-between mt-4">
                    <span>Belum punta akun? <a href="{{ route('auth.register.page') }}"
                            class="text-blue-400 font-bold">Register</a></span>
                    <button class="btn btn-info text-white">Login</button>
                </div>
            </x-form.group>
        </div>
    </div>
@endsection
