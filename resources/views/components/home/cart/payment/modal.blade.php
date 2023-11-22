<x-modal.index title="Pembayaran" id="payment_modal">
    <x-form.group action="{{ route('transactions.pay') }}" method="POST">
        @csrf
        <div class="h-82 oveflow-auto">
            <div class="mb-3">
                <label for="address" class="label font-semibold">Pengiriman Ke</label>
                <div class="flex flex-col gap-2 h-28 overflow-auto">
                    <x-home.cart.payment.address :user=$user />
                </div>
            </div>
            <div class="mb-3">
                <label for="" class="label font-semibold">Metode Pembayaran</label>
                <x-home.cart.payment.method />
            </div>
        </div>
        <div class="mt-3">
            <span class="label font-semibold">Biaya Pembelian</span>
            <x-home.cart.payment.total :subtotal=$subtotal />
        </div>
        <hr class="my-4">
        <div class="flex justify-end">
            <button class="btn btn-info text-white btn-disabled" type="submit">Bayar</button>
        </div>
    </x-form.group>
</x-modal.index>
