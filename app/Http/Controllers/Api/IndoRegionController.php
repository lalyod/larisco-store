<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;

class IndoRegionController extends Controller
{
    public function province()
    {
        $provinces = Province::all();
        return response()->json([
            "data" => $provinces
        ]);
    }

    public function regency(Province $province)
    {
        $regencies = Regency::where("province_id", $province->id)->get();
        return response()->json([
            "data" => $regencies
        ]);
    }

    public function distric(Regency $regency)
    {
        $districs = District::where("regency_id", $regency->id)->get();
        return response()->json([
            "data" => $districs
        ]);
    }
    
    public function village(District $distric)
    {
        $villages = Village::where('district_id', $distric->id)->get();
        return response()->json([
            "data" => $villages
        ]);
    }
}
