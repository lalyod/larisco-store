<div class="card lg:w-56 w-full h-fit bg-base-100 shadow-xl">
    <figure><img src="{{ Storage::url('public/products/' . $product->image) }}" alt="Shoes" class="w-44 p-3" /></figure>
    <div class="card-body pt-0">
        <h2 class="card-title">{{ $product->name }}</h2>
        <div class="card-actions justify-between flex items-center">
            <span class="font-bold">{{ number_format($product->price) }}</span>
            <label for="my-drawer-{{ $product->id }}" class="drawer-button btn btn-neutral text-2xl"
                onclick="setPrice({{ $product->price }})">+</label>
        </div>
    </div>
</div>
