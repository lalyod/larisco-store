<div class="drawer drawer-end absolute z-10">
    <input id="my-drawer-{{ $product->id }}" type="checkbox" class="drawer-toggle" />
    <div class="drawer-side">
        <label for="my-drawer-{{ $product->id }}" aria-label="close sidebar" class="drawer-overlay"></label>
        <ul class="menu p-4 w-96 max-sm:w-80 min-h-full text-base-content" style="background-color: #F2FAF1;">
            <div class="flex justify-center">
                <img src="{{ Storage::url('public/products/' . $product->image) }}" alt=""
                    class="w-52 h-52 object-contain">
            </div>
            <form class="mt-10 flex flex-col items-stretch" id="form-{{ $product->id }}"
                action="{{ route('carts.store', $product->id) }}" method="POST">
                @csrf
                <div>
                    <h3 class="font-bold text-2xl">{{ $product->name }}</h3>
                    <div class="flex justify-between font-bold my-5">
                        <p class="font-bold text-xl">Rp.
                            <span id="currency-{{ $product->id }}">{{ number_format($product->price) }}</span>
                        </p>
                        <div class="flex gap-3 items-center text-lg">
                            <button class="border-2 border-black rounded px-2" onclick="decrease({{ $product->id }})"
                                type="button">-</button>
                            <span id="quantity-{{ $product->id }}" class="w-4 text-center">1</span>
                            <button class="border-2 border-black rounded px-2" onclick="increase({{ $product->id }})"
                                type="button">+</button>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-bold text-md">Detail Produk</h3>
                        <div class="text-left mt-2 h-44">
                            {{ $product->description }}
                        </div>
                    </div>
                </div>
                <input type="hidden" id="form-stock-{{ $product->id }}" name="quantity" value="1">
                <button class="btn btn-neutral mt-10 w-full" type="button"
                    onclick="formSubmit({{ $product->id }})">Tambah Ke Keranjang</button>
            </form>
        </ul>
    </div>
</div>
