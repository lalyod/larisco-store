@extends('layouts.admin')

@section('content')
    <div class="px-10 mt-10">
        <x-admin.products.modal :categories=$categories />
        <div class="flex justify-between">
            <h3 class="text-2xl font-bold">Produk</h3>
            <x-modal.trigger text="Tambah" modal="products_add" class="btn-info text-white" />
        </div>
        @if ($errors->any())
            <x-alert.error text="{{ $errors }}" />
        @endif
        @if (session()->has('success'))
            <x-alert.success text="{{ session()->get('success') }}" />
        @endif
        <div class="mt-10">
            <x-admin.products.table :products=$products />
        </div>
    </div>
@endsection
