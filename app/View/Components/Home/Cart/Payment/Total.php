<?php

namespace App\View\Components\Home\Cart\Payment;

use Illuminate\View\Component;

class Total extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public $subtotal
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
        return view('components.home.cart.payment.total');
    }
}
