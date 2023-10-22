@extends('layouts.admin')

@section('content')
    <div class="px-10 mt-9">
        <x-admin.products.detail.modal :categories=$categories :product=$product />
        <div class="flex justify-between items-center">
            <h3 class="text-2xl font-bold">Detail Produk</h3>
            <x-modal.trigger text="Edit" modal="products_edit" class="btn-info text-white" />
        </div>
        @if ($errors->any())
            <x-alert.error text="{{ $errors }}" />
        @endif
        @if (session()->has('success'))
            <x-alert.success text="{{ session()->get('success') }}" />
        @endif
        <div class="bg-slate-200 rounded-lg w-full p-5 mt-10">
            <div class="flex gap-5 items-center">
                <img src="{{ Storage::url('public/products/' . $product->image) }}" alt="{{ $product->image }}"
                    class="w-60 h-60 max-sm:w-36 max-sm:h-36 rounded-lg object-contain">
                <div class="w-full">
                    <x-form.textbox label="Nama" value="{{ $product->name }}" disabled />
                    <x-form.textarea label="Deskripsi" disabled>{{ $product->description }}</x-form.textarea>
                </div>
            </div>
            <div class="flex gap-5">
                <x-form.textbox label="Harga" value="{{ $product->price }}" disabled />
                <x-form.textbox label="Stok" value="{{ $product->stock }}" disabled />
            </div>
            <x-form.textbox label="Kategori" value="{{ $product->category->name }}" disabled />
        </div>
    </div>
@endsection
