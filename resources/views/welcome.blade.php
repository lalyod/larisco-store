@extends('layouts.default')

@section('content')
    <div class="mx-10 mt-8">
        <x-search-bar link="{{ route('home') }}" placeholder="Cari" name="search" />
        <div class="my-4">
            <div class="flex gap-8">
                <x-home.category-filter :categories=$categories />
            </div>
        </div>
        <x-alert.error :errors=$errors />
        <div class="mt-10">
            <h3 class="font-bold text-2xl">Semua Produk</h3>
            <div class="mt-5 lg:grid gap-10 flex flex-col items-center lg:grid-cols-4">
                @foreach ($products as $product)
                    <x-home.product-card :product=$product />
                    <x-home.product-drawer :product=$product />
                @endforeach
            </div>
        </div>
    </div>
@endsection
