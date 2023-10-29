<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use App\Services\Midtrans\CreateSnapTokenService;
use Exception;
use Midtrans\CoreApi as Midtrans;
use Midtrans\Transaction as MidtransTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = Auth::user();
        $snapToken = null;
        $carts = Cart::where('user_id', $user->id)->get();

        foreach ($carts as $cart) {
            $snapToken = $cart->snap_token;
        }

        if (is_null($snapToken)) {
            $midtrans = new CreateSnapTokenService($carts);
            $order = $midtrans->getOrder();

            $params = array_merge(
                $order,
                ['payment_type' => $request->input('payment_method')],
                [$request->input('payment_method') => [
                    'callback_url' => '/'
                ]]
            );

            try {
                $response = Midtrans::charge($params);
            } catch (Exception $ex) {
                dd($ex);
            }

            return view('pages.home.transactions.payment', [
                'title' => 'cart',
                'response' => $response
            ]);
        } else {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
    }

    /**
     * Display the specified resource.
     * 
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show($order)
    {
        try {
            \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
            $status = MidtransTransaction::status($order);

            return response()->json($status);
        } catch (Exception $ex) {
            dd($ex);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $carts = Cart::where('user_id', Auth::user()->id)->get();

        foreach ($carts as $cart) {
            if (!is_null($cart->snap_token)) return;
            Transaction::create([
                'quantity' => $cart->quantity,
                'total' => $cart->total,
                'snap_token' => $cart->snap_token,
                'product_id' => $cart->product_id,
                'user_id' => $cart->user_id
            ]);

            $cart->delete();
        }


        return redirect()->route('home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
