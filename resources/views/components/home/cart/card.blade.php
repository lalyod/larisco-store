<div class="bg-white shadow p-4 w-full rounded-lg flex justify-between">
    <div class="flex gap-4 font-bold">
        <img src="{{ Storage::url('public/products/' . $cart->product->image) }}" alt="{{ $cart->product->image }}"
            class="w-32 h-32 max-sm:w-12 max-sm:w-12 object-contain">
        <div class="flex flex-col justify-center gap-2">
            <span class="text-green max-sm:text-sm">Rp.
                {{ number_format($cart->product->price) }} x {{ $cart->quantity }}</span>
            <span class="text-2xl max-sm:text-lg">{{ $cart->product->name }}</span>
            <span class="max-sm:text-sm">Stock: {{ $cart->product->stock }}</span>
        </div>
    </div>
    <x-form.group action="{{ route('carts.update', $cart->id) }}"
        class="font-bold flex flex-col justify-center mr-5 gap-5 max-sm:gap-2 items-center" method="POST">
        @method('PUT')
        <input type="submit" class="border-2 border-black rounded px-2" value="+" name="increase">
        <span>{{ $cart->quantity }}</span>
        <input type="submit" class="border-2 border-black rounded px-2" value="-" name="decrease">
    </x-form.group>
</div>
