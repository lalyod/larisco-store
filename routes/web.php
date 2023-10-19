<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, "home"])->name("home");

Route::prefix("carts")->group(function () {
    Route::get("/", [CartController::class, "index"])->name("carts.index");

    Route::put("/{cart}", [CartController::class, "update"])->name("carts.update");
    Route::post("/{product}/products", [CartController::class, "store"])->name("carts.store");
});

Route::prefix('settings')->group(function () {
    Route::get('/', [UserController::class, 'edit'])->name('settings.edit.user');
});

Route::prefix("auth")->group(function () {
    Route::get('/login', [UserController::class, "login"])->name("auth.login.page");
    Route::get('/register', [UserController::class, 'register'])->name("auth.register.page");
    Route::get("/logout", [AuthController::class, "logout"])->name('auth.logout');

    Route::post("/register", [AuthController::class, "register"])->name("auth.register.store");
    Route::post("/login", [AuthController::class, "login"])->name("auth.login.store");
});

Route::prefix('admin')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name("admin.index");
    Route::prefix('categories')->group(function () {
        Route::get("/", [IndexController::class, 'category'])->name("admin.categories.index");
        Route::get("/{category}", [CategoryController::class, 'show'])->name("admin.categories.show");
        Route::get("/{category}/products", [CategoryController::class, 'products'])->name("admin.categories.products");

        Route::post("/", [CategoryController::class, 'store'])->name("admin.categories.store");
        Route::put("/{category}", [CategoryController::class, "update"])->name("admin.categories.update");
        Route::delete("/{category}", [CategoryController::class, 'destroy'])->name("admin.categories.destroy");
    });
    Route::prefix("products")->group(function () {
        Route::get("/", [IndexController::class, 'product'])->name("admin.products.index");
        Route::get("/{product}", [ProductController::class, 'edit'])->name("admin.products.edit");

        Route::post("/", [ProductController::class, "store"])->name("admin.products.store");
        Route::put("/{product}", [ProductController::class, "update"])->name("admin.products.update");
    });
});
