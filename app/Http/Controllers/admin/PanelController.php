<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use \App\Panel;

class PanelController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $panel_list = Panel::paginate(20);
        return view('admin.panel_list', ['panel_list' => $panel_list]);
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
        Alert::success('Inserted new panel '.$request->name, 'Done!');
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
        $panel = Panel::find($request->id);
        $panel->name = $request->name;
        $panel->save();
        Alert::success('Updated panel', 'Done!');
        return redirect()->back();
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
