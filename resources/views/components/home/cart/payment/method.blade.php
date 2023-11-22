<div class="flex flex-col font-bold gap-3 h-32 overflow-y-scroll">
    <label class="bg-white shadow p-3 rounded-lg flex items-center justify-between">
        <div class="flex gap-2 items-center">
            <img src="{{ asset('/img/gopay.png') }}" alt="" class="w-7 h-7">
            <span>Gopay</span>
        </div>
        <input type="radio" class="radio" name="payment_method" value="gopay">
    </label>
    <label class="label bg-white shadow p-3 rounded-lg flex justify-between">
        <div class="flex gap-2 items-center">
            <div class="overflow-hidden w-10 h-4">
                <img src="{{ asset('/img/qris.svg') }}" alt="qris" class="w-10 object-cover"
                    style="height: 15px;object-position: left;">
            </div>
            <span>QRIS</span>
        </div>
        <input type="radio" class="radio" name="payment_method" value="qris">
    </label>
</div>
