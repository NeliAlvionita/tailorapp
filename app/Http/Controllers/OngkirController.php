<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemesanan;
use App\Province;
use App\City;
use App\Courier;
use Illuminate\Support\Facades\Auth;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class OngkirController extends Controller
{
    public function getCities($id){
    $city = City::where('province_id', $id)->pluck('name', 'city_id');
    return json_encode($city);
    }
}
