<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $products = Product::all()->count();
        $categories = Category::all()->count();
        return view("pages.admin.dashboard", [
            "title" => "dashboard",
            "categories" => $categories,
            "products" => $products
        ]);
    }

    public function category()
    {
        $categories = Category::all();
        return view("pages.admin.categories.index", [
            "title" => "categories",
            "categories" => $categories
        ]);
    }

    public function product()
    {
        $products = Product::all();
        $categories = Category::all();
        return view("pages.admin.products.index", [
            "title" => "products",
            "products" => $products,
            "categories" => $categories
        ]);
    }
}
