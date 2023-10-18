@extends('layouts.admin')

@section('content')
    <div class="px-10 mt-9">
        <div class="flex">
            <h3 class="text-2xl font-bold">Product Kategori</h3>
        </div>
        <div class="mt-10">
            <x-admin.categories.filter :category=$category />
        </div>
        <div class="mt-10">
            <x-admin.categories.product.table :products=$products />
        </div>
    </div>
@endsection
