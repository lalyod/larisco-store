<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class RajaOngkirController extends Controller
{
    public function provinces()
    {
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIR_KEY')
        ])->get('https://api.rajaongkir.com/starter/province');

        return $response->json();
    }

    public function province($id)
    {
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIR_KEY')
        ])->get('https://api.rajaongkir.com/starter/province?id=' . $id);

        return $response->json();
    }

    public function cities()
    {
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIR_KEY')
        ])->get('https://api.rajaongkir.com/starter/city');

        return $response->json();
    }

    public function city($id)
    {
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIR_KEY')
        ])->get('https://api.rajaongkir.com/starter/city?id=' . $id);

        return $response->json();
    }

    public function province_city($province)
    {
        $response = Http::withHeaders([
            'key' => env('RAJAONGKIR_KEY')
        ])->get('https://api.rajaongkir.com/starter/city?province=' . $province);

        return $response->json();
    }

    public function cost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'origin' => 'required|integer',
            'destination' => 'required|integer',
            'weight' => 'required|integer|min:10',
            'courier' => "required|in:jne,jnt|string"
        ]);

        if ($validator->fails()) return response()->json(['messages' => $validator->fails()]);

        $response = Http::withHeaders([
            'key' => env('RAJAONGKIR_KEY')
        ])->post('https://api.rajaongkir.com/starter/cost', [
            "origin" => 501,
            "destination" => 114,
            "weight" => 1700,
            "courier" => "jne"
        ]);

        return $response->json();
    }
}
