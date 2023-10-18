@extends('layouts.admin')

@section('content')
    <div class="container-admin mx-auto px-10">
        <h3 class="font-bold pt-8 text-5xl">Dashboard</h3>
        <div class="pt-10 font-bold grid grid-cols-3 gap-5">
            <div class="flex flex-col gap-4 p-7 rounded-lg shadow" style="background-color: #FFE8B2">
                <div class="flex justify-between items-center">
                    <span class="text-2xl">10.000</span>
                    <img src="{{ asset('/img/money.svg') }}" alt="" class="w-15 h-10">
                </div>
                <span class="pr-16">Total Pendapatan</span>
            </div>
            <div class="flex flex-col gap-4 p-7 rounded-lg shadow" style="background-color: #D1F9F5">
                <div class="flex justify-between items-center">
                    <span class="text-2xl">0</span>
                    <img src="{{ asset('/img/shopping-bag.svg') }}" alt="" class="w-15 h-10">
                </div>
                <span class="pr-16">Pesanan</span>
            </div>
            <div class="flex flex-col gap-4 p-7 rounded-lg shadow" style="background-color: #FFCEE3">
                <div class="flex justify-between items-center">
                    <span class="text-2xl">1</span>
                    <img src="{{ asset('/img/user.svg') }}" alt="" class="w-15 h-10">
                </div>
                <span class="pr-16">Pengguna</span>
            </div>
            <div class="flex flex-col gap-4 p-7 rounded-lg shadow" style="background-color: #D3E2FF">
                <div class="flex justify-between items-center">
                    <span class="text-2xl">{{ $products }}</span>
                    <img src="{{ asset('/img/package.svg') }}" alt="" class="w-15 h-10">
                </div>
                <span class="pr-16">Produk</span>
            </div>
            <div class="flex flex-col gap-4 p-7 rounded-lg shadow" style="background-color: #FFDDBF">
                <div class="flex justify-between items-center">
                    <span class="text-2xl">{{ $categories }}</span>
                    <img src="{{ asset('/img/menu.svg') }}" alt="" class="w-15 h-10">
                </div>
                <span class="pr-16">Kategori</span>
            </div>
        </div>
    </div>
@endsection
