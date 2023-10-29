<?php

use App\Http\Controllers\Api\IndoRegionController;
use App\Http\Controllers\Api\RajaOngkirController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('rajaongkir')->group(function () {
    Route::prefix('provinces')->group(function () {
        Route::get('/', [RajaOngkirController::class, 'provinces']);
        Route::get('/{id}', [RajaOngkirController::class, 'province']);
    });
    Route::prefix('cities')->group(function () {
        Route::get('/', [RajaOngkirController::class, 'cities']);
        Route::get('/{id}', [RajaOngkirController::class, 'city']);
        Route::get('/{province}/province', [RajaOngkirController::class, 'province_city']);
    });
    Route::post('/cost', [RajaOngkirController::class, 'cost']);
});

Route::get('/midtrans/order/{order}/check', [TransactionController::class, 'show']);