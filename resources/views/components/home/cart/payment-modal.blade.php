<div>
    <x-modal.index title="Pembayaran" id="payment_modal">
        <div class="mb-3">
            <label for="address" class="label">Alamat</label>
            <textarea name="" id="address" cols="30" rows="10" class="w-full p-4 bg-green h-20 rounded-lg text-white"
                disabled>{{ $user->address }}</textarea>
        </div>
        <div class="mb-3">
            <label for="" class="label">Metode Pembayaran</label>
            <div class="bg-white shadow p-3 rounded-lg flex justify-between">
                <span>COD</span>
                <input type="radio">
            </div>
        </div>
        <div class="mb-3">
            <label for="" class="label">Biaya Pembelian</label>
            <div class="px-1">
                <div class="flex justify-between">
                    <span>Subtotal</span>
                    <span>Rp. {{ number_format($subtotal) }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Biaya Pengiriman</span>
                    <span>Rp. </span>
                </div>
                <hr>
                <div class="flex justify-between">
                    <span>Total</span>
                    <span>Rp. </span>
                </div>
            </div>
        </div>
        <div>
            <button class="btn btn-info" id="#pay">Bayar</button>
        </div>
    </x-modal.index>
</div>
