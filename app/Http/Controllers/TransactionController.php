<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $transactions = Transaction::where("user_id", $user->id)->get();

        return view("pages.home.cart", [
            "title" => "cart",
            "transactions" => $transactions,
            "subtotal" => $transactions->sum("total")
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            "quantity" => "required|integer|min:1",
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());

        $total = $product->price * $request->quantity;
        $user = Auth::user();

        $transaction = [
            "quantity" => $request->quantity,
            "total" => $total,
            "product_id" => $product->id,
            "user_id" => $user->id
        ];

        Transaction::create($transaction);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
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
        if($request->has("increase")){
            $transaction->quantity += 1;
            $transaction->total = $transaction->quantity * $transaction->product->price;
            $transaction->save();
            
            return redirect()->back()->with('success', 'increased');
        }else if($request->has("decrease")){
            $transaction->quantity = $transaction->quantity != 1 ? $transaction->quantity - 1 : $transaction->quantity = 1;
            $transaction->total = $transaction->quantity * $transaction->product->price;
            $transaction->save();

            return redirect()->back();
        }
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
