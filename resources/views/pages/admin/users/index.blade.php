@extends('layouts.admin')

@section('content')
    <div class="px-10 mt-10">
        <div class="flex justify-between lg:items-center max-sm:flex-col">
            <h3 class="text-2xl font-bold">Pengguna</h3>
            <x-search-bar link="{{ route('admin.users.index') }}" placeholder="Cari user" name="user" />
        </div>
        <x-admin.users.filter />
        <div class="mt-10">
            <x-admin.users.table :users=$users />
        </div>
    </div>
@endsection
