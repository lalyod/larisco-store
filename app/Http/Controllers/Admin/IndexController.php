<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function product(Request $request)
    {
        $products = Product::query();
        $categories = Category::all();

        if ($request->has('product')) {
            $products->where('name', 'LIKE', '%' . $request->input('product') . '%');
        }

        $products = $products->get();

        return view("pages.admin.products.index", [
            "title" => "products",
            "products" => $products,
            "categories" => $categories
        ]);
    }

    public function user(Request $request): View
    {
        $users = User::query();

        if ($request->has('role')) {
            $users->where('role', $request->input('role'));
        } else if ($request->has('user')) {
            $users->where('name', 'LIKE', '%' . $request->input('user') . '%');
        }

        $users = $users->get();

        return view('pages.admin.users.index', [
            'title' => 'users',
            'users' => $users
        ]);
    }

    public function detail_user(User $user): View
    {
        return view('pages.admin.categories.detail', [
            'title' => 'users',
            'user' => $user
        ]);
    }
}
