<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use \App\MetroLine;

class MetroLineController extends Controller{
    /**
     * Display a listing of the Metro lines.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $cities = \App\City::all();
        $metro_line_list = MetroLine::paginate(20);
        return view('admin.metro_line.metro_line_list', ['metro_line_list' => $metro_line_list, 'cities' => $cities]);
    }

    /**
     * Show the form for creating a new metro line.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $cities = \App\City::all();
        return view('admin.metro_line.metro_line_create', ['cities' => $cities]); 
    }

    /**
     * Store a newly created metro line in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'city_id' => 'required|integer',
            'image_file' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time().'.'.$request->image_file->getClientOriginalExtension();
        $request->image_file->move(public_path('images/metro/'), $imageName);

        $metro_line = new MetroLine;
        $metro_line->city_id = $request->city_id;
        $metro_line->name = $request->name;
        $metro_line->image = $imageName;
        $metro_line->save();

        return back()->with(['message'=>['type' => 'success', 'title' => 'Created!', 'message'=>'New Metro Line created!', 'position' => 'topCenter']]);
    }

    /**
     * Update the specified metro line in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $metro_line = MetroLine::find($id);
        $metro_line->city_id = $request->city_id;
        $metro_line->name = $request->name;
        $metro_line->save();
        Alert::success('Metro Line Updated!', 'Done!');
        return redirect()->back();
    }

    /**
     * Remove the specified metro line from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        // Delete all stations in it
        
        $metro_line = MetroLine::find($id);
        $metro_line->delete();
        return;
    }
}
