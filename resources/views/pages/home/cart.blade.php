@extends('layouts.default')

@php
    $user = Auth::user();
@endphp

@section('content')
    <div class="px-10 mt-10">
        <div>
            <h3 class="text-2xl font-bold">Cart</h3>
        </div>
        <x-home.cart.payment-modal :user=$user :subtotal=$subtotal />
        <div class="mt-10 max-sm:flex max-sm:flex-col max-sm:gap-5">
            @foreach ($carts as $cart)
                <x-home.cart.card :cart=$cart />
            @endforeach
        </div>
        <x-home.cart.total :subtotal=$subtotal />
    </div>
@endsection