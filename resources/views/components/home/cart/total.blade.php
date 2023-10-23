<div class="bg-white fixed p-5 shadow rounded-lg bottom-0 max-sm:right-12" style="width: 73%" id="total-menu">
    <div class="flex flex-col gap-2">
        <div class="flex justify-between">
            <span>Subtotal</span>
            <span>Rp. {{ number_format($subtotal) }}</span>
        </div>
    </div>
    <hr class="my-2">
    <div class="flex flex-col gap-3">
        <x-modal.trigger text="Checkout" modal="payment_modal" class="btn btn-neutral w-full" />
    </div>
</div>