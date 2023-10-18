<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "image" => "required|image|mimes:jpeg,jpg,png,svg",
            "name" => "required|string|min:3",
            "description" => "string|min:4|nullable",
            "price" => "required|integer|min:500",
            "stock" => "required|integer|min:1",
            "category_id" => "required|exists:categories,id"
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());

        $image = $request->file("image");
        $image->storeAs("public/products/", $image->hashName());

        Product::create([
            "image" => $image->hashName(),
            "name" => $request->name,
            "description" => $request->description,
            "price" => $request->price,
            "stock" => $request->stock,
            "category_id" => $request->category_id
        ]);

        return redirect()->route("admin.products.index")->with("success", "Data berhasil dibuat");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view("pages.admin.products.detail", [
            "title" => "products",
            "product" => $product,
            "categories" => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validator = Validator::make($request->all(), [
            "image" => "image|mimes:svg,png,jpg,jped",
            "name" => "string|min:3",
            "description" => "string|min:4|nullable",
            "price" => "integer|min:500",
            "stock" => "integer|min:1",
            "category_id" => "integer|exists:categories,id"
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());

        if ($request->hasFile("image")) {
            $image = $request->file("image");
            $image->storeAs("public/products/", $image->hashName());

            Storage::delete("public/products/" . $product->image);

            $product->update([
                "image" => $image->hashName(),
                "name" => $request->name,
                "description" => $request->description,
                "price" => $request->price,
                "stock" => $request->stock,
                "category_id" => $request->category_id,
            ]);

            return redirect()->back()->with("success", "Data berhasil di edit");
        } else {
            $product->update($request->all());

            return redirect()->back()->with("success", "Data berhasil di edit");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
