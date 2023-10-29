<?php

namespace App\Services\Midtrans;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
{
    protected $orders;

    public function __construct($orders)
    {
        parent::__construct();

        $this->orders = $orders;
    }

    public function getOrder()
    {
        $user = Auth::user();
        $transaction_details = [
            'order_id' => Str::random(10),
            'gross_amount' => $this->orders->sum('total')
        ];

        $item_details = [];
        foreach ($this->orders as $order) {
            array_push($item_details, [
                'id' => $order->id,
                'price' => $order->total,
                'quantity' => $order->quantity,
                'name' => $order->product->name
            ]);
        }

        $customer_details = [
            'first_name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone_number
        ];

        $params = array_merge(
            [
                'transaction_details' => $transaction_details
            ],
            [
                'items_details' => $item_details
            ],
            [
                'customer_details' => $customer_details
            ]
        );

        return $params;
    }
}
