<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use \App\Station;

class StationController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($city_id){
        $city = \App\City::findOrFail($city_id);
        $cities = \App\City::all();
        $stations = Station::where(['city_id' => $city_id])->paginate(20);
        return view('admin.station', ['stations' => $stations, 'current_city' => $city, 'cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $station = new Station;
        $station->city_id = $request->city_id;
        $station->name = $request->name;
        $station->save();
        Alert::success('Inserted new station '.$request->name, 'Done!');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $station = Station::find($id);
        $station->city_id = $request->city_id;
        $station->name = $request->name;
        $station->save();
        Alert::success('Station Updated!', 'Done!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        // Delete Panels in it
        $station = Station::find($id);
        $station->delete();
        return;
    }
}
