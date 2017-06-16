<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use \App\MetroLine;

class MetroController extends Controller{

    public function metro_lines($city_id){
        $city = \App\City::findOrFail($city_id);
        $metro_lines = MetroLine::where('city_id', $city->id)->get();
        return view('user.metro.metro_lines', ['metro_lines' => $metro_lines, 'city' => $city]);
    }

    public function metro_line_stations($metro_line_id){
        $metro_line = MetroLine::findOrFail($metro_line_id);
        $stations = \App\Station::where('metro_line_id', $metro_line->id)->get();
        return view('user.metro.stations', ['stations' => $stations, 'metro_line' => $metro_line]);
    }

    public function show_panels($station_id){
        $station = \App\Station::findOrFail($station_id);
        $panels = \App\Panel::where('station_id', $station_id)->get();
    }

}
