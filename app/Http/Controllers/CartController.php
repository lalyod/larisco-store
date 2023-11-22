<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!Gate::check('is-user')) return redirect()->back()->withErrors("Login dulu bro");

        $user = Auth::user();
        $carts = Cart::where("user_id", $user->id)->get();
        $total = $carts->sum("total");

        return view("pages.home.cart", [
            "title" => "cart",
            "carts" => $carts,
            "subtotal" => $total
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
        if (!Gate::check('is-user')) return redirect()->back()->withErrors(["message" => "Belum login bro"]);

        $validator = Validator::make($request->all(), [
            "quantity" => "required|integer|min:1",
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());

        $cart = Cart::where('product_id', $product->id)->first();
        if (!empty($cart)) {
            $this->update($request, $cart);

            return redirect()->route('carts.index');
        } else {
            $total = $product->price * $request->quantity;
            $user = Auth::user();

            $cart = [
                "quantity" => $request->quantity,
                "total" => $total,
                "product_id" => $product->id,
                "user_id" => $user->id
            ];

            Cart::create($cart);

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        if ($request->has("increase")) {
            $cart->quantity += 1;
            $cart->total = $cart->quantity * $cart->product->price;
            $cart->save();

            return redirect()->back();
        } else if ($request->has("decrease")) {
            $cart->quantity = $cart->quantity != 1 ? $cart->quantity - 1 : $cart->quantity = 1;
            $cart->total = $cart->quantity * $cart->product->price;
            $cart->save();

            return redirect()->back();
        } else {
            $cart->quantity += $request->quantity;
            $cart->save();

            return redirect()->route('carts.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
