@extends('layouts.admin')

@section('content')
    <div class="px-10 mt-10">
        <x-admin.products.modal :categories=$categories />
        <div class="flex justify-between lg:items-center max-sm:flex-col">
            <h3 class="text-2xl font-bold">Produk</h3>
            <x-search-bar link="{{ route('admin.products.index') }}" placeholder="Cari produk" name="product" />
        </div>
        <x-alert.error :errors=$errors />
        @if (session()->has('success'))
            <x-alert.success text="{{ session()->get('success') }}" />
        @endif
        <div class="mt-5">
            <x-modal.trigger text="Tambah" modal="products_add" class="btn-info text-white mb-5" />
            <x-admin.products.table :products=$products />
        </div>
    </div>
@endsection
