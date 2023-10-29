<?php

namespace App\View\Components\Home\Cart;

use Illuminate\View\Component;

class PaymentModal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public $user,
        public $subtotal,
        public $cart
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.cart.payment-modal');
    }
}
