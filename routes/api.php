<?php

use App\Http\Controllers\Api\IndoRegionController;
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

Route::get('/provinces', [IndoRegionController::class, 'province']);
Route::get('/provinces/{province}/regencies', [IndoRegionController::class, 'regency']);
Route::get('/regencies/{regency}/districs', [IndoRegionController::class, 'distric']);
Route::get('/districs/{distric}/villages', [IndoRegionController::class, 'village']);