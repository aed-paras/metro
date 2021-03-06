<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use \App\Media;

class MediaController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $media_list = Media::paginate(20);
        return view('admin.media_list', ['media_list' => $media_list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $media = new Media;
        $media->name = $request->name;
        $media->save();
        return back()->with(['message'=>['type' => 'success', 'title' => 'Created!', 'message'=>'New Media created!', 'position' => 'topCenter']]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $media = Media::find($id);
        $media->name = $request->name;
        $media->save();
        return back()->with(['message'=>['type' => 'success', 'title' => 'Updated!', 'message'=>'Media changed!', 'position' => 'topCenter']]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $media = Media::find($id);
        $media->delete();
        return;
    }
}
