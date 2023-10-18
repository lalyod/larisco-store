<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
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
            "image" => "required|image|mimes:jpg,png,jpeg,gif,svg",
            "name" => "required|string|min:3"
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator->errors());

        $image = $request->file('image');
        $image->storeAs('/public/categories', $image->hashName());

        Category::create([
            "image" => $image->hashName(),
            "name" => $request->name
        ]);

        return redirect()->route("admin.categories.index")->with(["success" => "Berhasil membuat kategori baru"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view("pages.admin.categories.detail", [
            "title" => "categories",
            "category" => $category
        ]);
    }

    public function products(Category $category)
    {
        $products = Product::where("category_id", $category->id)->get();
        return view("pages.admin.categories.product", [
            "title" => "categories",
            "products" => $products,
            "category" => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validator = Validator::make($request->all(), [
            "image" => "image|mimes:png,jpeg,jpg,svg",
            "name" => "string|min:3"
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors([$validator->errors()]);

        if ($request->hasFile("image")) {
            $image = $request->file("image");
            $image->storeAs("public/categories", $image->hashName());

            Storage::delete('public/categories/' . $category->image);

            $category->update([
                "image" => $image->hashName(),
                "name" => $request->name
            ]);
            return redirect()->route("admin.categories.show", $category->id)->with("success", "Data berhasil di update");
        } else {
            $category->update($request->all());
            return redirect()->route("admin.categories.show", $category->id)->with("success", "Data berhasil di update");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Storage::delete("public/categories/" . $category->image);
        $category->delete();
        return redirect()->route("admin.categories.index")->with("success", "Data berhasil di hapus");
    }
}
