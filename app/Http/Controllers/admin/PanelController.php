<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use \App\Panel;
use \App\Station;

class PanelController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($station_id){
        $panel_list = Panel::where('station_id', $station_id)->get();
        $station = Station::find($station_id);
        return view('admin.panel.panel_list', ['panel_list' => $panel_list, 'station' => $station]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($station_id){
        $station = Station::find($station_id);
        $media_list = \App\Media::all();
        $panel_type_list = \App\PanelType::all();
        return view('admin.panel.panel_create', ['station' => $station, 'media_list' => $media_list, 'panel_type_list' => $panel_type_list]);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $panel = new Panel;
        $panel->name = $request->name;
        $panel->save();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $panel = Panel::find($request->id);
        $panel->name = $request->name;
        $panel->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $panel = Panel::find($id);
        $panel->delete();
        return;
    }
}
