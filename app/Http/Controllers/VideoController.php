<?php

namespace Congreso\Http\Controllers;

use Illuminate\Http\Request;
use Congreso\Video;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class VideoController extends Controller
{
    public function edit($id){
        $video = Video::find($id);
        return view('administracion.videos.edit',compact('video'));


    }

    public function index(Request $request){
        $videos= Video::where('id',1)->paginate(1);
        if($request->ajax()){
            return response()->json(view('administracion.videos.ajax-videos',compact('videos'))->render());
        }
        return view('administracion.videos.index',compact('videos'));

    }

     public function update(Request $request, $id){
        $video = Video::find($id);
        $video->fill($request->all());

        if($video->save()){
            return Redirect::to('administracion/videos')->with('mensaje-registro', 'Video Actualizado Correctamente');
        }



    }
}
