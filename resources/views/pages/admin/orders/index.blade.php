@extends('layouts.admin')

@section('content')
    <div class="mt-10 px-10">
        <div>
            <h3 class="text-2xl font-bold">Order</h3>
        </div>
        <div class="mt-10">
            <x-admin.orders.table :transactions=$transactions />
        </div>
    </div>
@endsection
