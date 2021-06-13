<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;

class AjaxController extends Controller
{
    public function getDistricts()
    {
        $province = Province::find(request('province_id'));
        $province->load('districts');
        return response()->json($province->districts);
    }
    
    public function getWards()
    {
        $district = District::find(request('district_id'));
        $district->load('wards');
        return response()->json($district->wards);
    }
}
