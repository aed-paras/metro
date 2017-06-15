<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use \App\PanelType;

class PanelTypeController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $panel_type_list = PanelType::paginate(20);
        return view('admin.panel_type', ['panel_type_list' => $panel_type_list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $panel_type = new PanelType;
        $panel_type->name = $request->name;
        $panel_type->save();
        return back()->with(['message'=>['type' => 'success', 'title' => 'Created!', 'message'=>'New panel type created!', 'position' => 'topCenter']]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $panel = PanelType::find($request->id);
        $panel->name = $request->name;
        $panel->save();
        return back()->with(['message'=>['type' => 'success', 'title' => 'Updated!', 'message'=>'Panel type updated!', 'position' => 'topCenter']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $panel = PanelType::find($id);
        $panel->delete();
        return;
    }
}
