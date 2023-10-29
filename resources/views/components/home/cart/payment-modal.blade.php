<x-modal.index title="Pembayaran" id="payment_modal">
    <x-form.group action="{{ route('transactions.pay') }}" method="POST">
        @csrf
        <div class="h-80">
            <div class="mb-3">
                <label for="address" class="label">Pengiriman Ke</label>
                @foreach ($user->addresses as $address)
                    <div class="bg-green  text-white font-bold shadow p-3 rounded-lg flex flex-col">
                        <span>{{ $address->province }}</span>
                        <span>{{ $address->city }}</span>
                        <span>{{ $address->postal_code }}</span>
                        <input type="hidden" name="address_id" value="{{ $address->id }}">
                    </div>
                @endforeach
            </div>
            <div class="mb-3">
                <label for="" class="label">Metode Pembayaran</label>
                <div class="flex flex-col font-bold gap-3 h-32 overflow-y-scroll">
                    <div class="bg-white shadow p-3 rounded-lg flex items-center justify-between">
                        <div class="flex gap-2 items-center">
                            <img src="{{ asset('/img/gopay.png') }}" alt="" class="w-7 h-7">
                            <span>Gopay</span>
                        </div>
                        <input type="radio" name="payment_method" value="gopay">
                    </div>
                    <div class="bg-white shadow p-3 rounded-lg flex justify-between">
                        <div class="flex gap-2 items-center">
                            <div class="overflow-hidden w-10 h-4">
                                <img src="{{ asset('/img/qris.svg') }}" alt="qris" class="w-10 object-cover"
                                    style="height: 15px;object-position: left;">
                            </div>
                            <span>QRIS</span>
                        </div>
                        <input type="radio" name="payment_method" value="qris">
                    </div>
                </div>
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
            <button class="btn btn-info" type="submit">Bayar</button>
        </div>
    </x-form.group>
</x-modal.index>
