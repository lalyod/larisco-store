@extends('layouts.admin')

@section('content')
    <div class="px-10 mt-9">
        <x-admin.categories.modal-add id="categories_add" />
        <div class="flex justify-between items-center">
            <h3 class="font-bold text-2xl">Kategori</h3>
            <x-modal.trigger text="Tambah" class="btn btn-info text-white" modal="categories_add" />
        </div>
        @if ($errors->any())
            <x-alert.error text="{{ $errors }}" />
        @endif
        @if (session()->has('success'))
            <x-alert.success text="{{ session()->get('success') }}" />
        @endif
        <div class="mt-5">
            <x-admin.categories.table :categories=$categories />
        </div>
    </div>
@endsection
