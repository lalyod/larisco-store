<?php

namespace App\View\Components\Modal;

use Illuminate\View\Component;

class Trigger extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $text,
        public string $modal
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
        return view('components.modal.trigger');
    }
}
