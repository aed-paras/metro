<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use \App\City;

class CityController extends Controller{
    public function index(){
        $cities = City::paginate(20);
        return view('admin.city', ['cities' => $cities]);
    }

    public function store(Request $request){
        $city = new City;
        $city->name = $request->name;
        $city->save();
        return redirect(url('admin/city'))->with(['message'=>['type' => 'success', 'title' => 'Created!', 'message'=>'New city created!', 'position' => 'bottomCenter']]);
    }

    public function update(Request $request){
        $city = City::find($request->id);
        $city->name = $request->name;
        $city->save();
        return redirect(url('admin/city'))->with(['message'=>['type' => 'success', 'title' => 'Updated!', 'message'=>'City name changed!', 'position' => 'bottomCenter']]);
    }

    public function destroy($id){
        // TODO: Delete all stations in it.
        $city = City::find($id);
        $city->delete();
        return;
    }

}
