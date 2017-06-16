<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use \App\MetroLine;

class MetroController extends Controller{

    public function metro_lines($city_id){
        $city = \App\City::findOrFail($city_id);
        $metro_lines = MetroLine::where('city_id', $city->id)->get();
        return view('user.metro.metro_lines', ['metro_lines' => $metro_lines]);
    }

}
