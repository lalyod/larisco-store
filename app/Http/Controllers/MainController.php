<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(Request $request)
    {
        $categories = Category::all();
        $products = Product::query();

        if ($request->has('category')) {
            $products->whereHas('category', function ($query) use ($request) {
                $query->where('name', $request->input('category'));
            });
        } else if ($request->has('search')) {
            $products->where('name', 'LIKE', '%' . $request->input('search') . '%');
        }

        $products = $products->get();

        return view("welcome", [
            "title" => "home",
            "categories" => $categories,
            "products" => $products
        ]);
    }
}
