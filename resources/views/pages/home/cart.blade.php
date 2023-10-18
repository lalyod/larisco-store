@extends('layouts.default')

@section('content')
    <div class="px-10 mt-10">
        <div>
            <h3 class="text-2xl font-bold">Cart</h3>
        </div>
        <div class="mt-10">
            @foreach ($transactions as $transaction)
                <div class="bg-white shadow p-4 w-full rounded-lg flex justify-between">
                    <div class="flex gap-4 font-bold">
                        <img src="{{ Storage::url('public/products/' . $transaction->product->image) }}"
                            alt="{{ $transaction->product->image }}" class="w-32 h-32 object-contain">
                        <div class="flex flex-col justify-center gap-2">
                            <span class="text-green">Rp.
                                {{ number_format($transaction->product->price) }} x {{ $transaction->quantity }}</span>
                            <span class="text-2xl">{{ $transaction->product->name }}</span>
                            <span>Stock: {{ $transaction->product->stock }}</span>
                        </div>
                    </div>
                    <x-form.group action="{{ route('carts.update', $transaction->id) }}"
                        class="font-bold flex flex-col justify-center mr-5 gap-5 items-center" method="POST">
                        @method('PUT')
                        <input type="submit" class="border-2 border-black rounded px-2" value="+" name="increase">
                        <span>{{ $transaction->quantity }}</span>
                        <input type="submit" class="border-2 border-black rounded px-2" value="-" name="decrease">
                    </x-form.group>
                </div>
            @endforeach
        </div>
        <div
            class="bg-white w-full fixed left-0 -z-10 bottom-0 h-50 border w-3/4 right-0 left-72 rounded-lg shadow px-3 py-4">
            <div class="flex flex-col gap-2">
                <div class="flex justify-between">
                    <span>Subtotal</span>
                    <span>Rp. {{ number_format($subtotal) }}</span>
                </div>
                <div>
                    <span>Biaya Pengiriman</span>
                    <span></span>
                </div>
            </div>
            <hr class="my-2">
            <div class="flex flex-col gap-3">
                <div>
                    <span class="font-bold">Total</span>
                </div>
                <button class="btn btn-neutral w-full">Checkout</button>
            </div>
        </div>
    </div>
@endsection
