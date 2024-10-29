<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getCities($governorate_id)
    {
        $cities = City::where('governorate_id', $governorate_id)->get();
        return response()->json($cities);
    }
}
