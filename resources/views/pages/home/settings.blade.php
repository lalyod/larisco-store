@extends('layouts.default')

@section('content')
    <div class="px-10 mt-10">
        <div>
            <h3 class="text-2xl font-bold">Pengaturan</h3>
        </div>
        <x-home.settings.modal :provinces=$provinces />
        <div class="bg-white p-5 shadow my-10 rounded-lg">
            <h3 class="font-bold">Profil Saya</h3>
            <span class="text-sm">Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</span>
            <hr class="my-2">
            <x-home.settings.form :user=$user />
        </div>
    </div>
@endsection
