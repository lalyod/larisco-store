@extends('layouts.admin')

@section('content')
    <div class="px-10 mt-9">
        <x-admin.categories.detail.modal :category=$category />
        <div class="flex justify-between">
            <h3 class="text-2xl font-bold">Kategori Detail</h3>
            <x-modal.trigger text="Edit" modal="categories_update" class="btn-info text-white" />
        </div>
        <div class="mb-3">
            @if ($errors->any())
                <x-alert.error text="{{ $errors }}" />
            @endif
            @if (session()->has('success'))
                <x-alert.success text="{{ session()->get('success') }}" />
            @endif
        </div>
        <x-admin.categories.filter :category=$category />
        <div class="bg-slate-200 p-4 rounded-lg mt-10">
            <div class="flex gap-4">
                <img src="{{ Storage::url('public/categories/' . $category->image) }}" alt=""
                    class="w-52 h-52 object-contain rounded-lg
                ">
                <x-form.textbox label="Name" value="{{ $category->name }}" disabled />
            </div>
        </div>
    </div>
@endsection
