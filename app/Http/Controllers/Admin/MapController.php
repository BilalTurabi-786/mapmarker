<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\GoogleMap;
use App\Models\Admin\SocialLink;

use Validator;
class MapController extends Controller
{
    //
    public function google_map(){
        return view('admin.pages.vendor.list');
    }
    public function google_map_process(Request $request){
        $controlls=$request->all();
        $rules=array(
            "name"=>"required",
            "description"=>"required",
            "latitude"=>"required",
            "langitude"=>"required",
            "links"=>"nullable");
            $validator=Validator::make($controlls,$rules);
            if($validator->fails()){
                return response()->json(['error'=>$validator->errors()], 401);  
            }
            else{
                $map=new GoogleMap;
                $map->mark_name=$request->name;
                $map->mark_description=$request->description;
                $map->latitude=$request->latitude;
                $map->langitude=$request->langitude;
                $map->save();
                foreach ($request->links as $link) {
                    $social=new SocialLink;
                    $social->link=$link;
                    $social->google_map_id=$map->id;
                    $social->save();
                }
                return response()->json(['success'=>"Mark Added...!"]);
            }
    }
    public function import_excel(){
        return view('admin.pages.import');
    
    }
    public function import_excel_process(Request $request){
        $rows=$request->rows;

        foreach ($rows as $key => $value) {
            // dd($value['name']);
            $map=new GoogleMap;
            $map->mark_name=$value['name'];
            $map->mark_description=$value['description'];
            $map->latitude=$value['lat'];
            $map->langitude=$value['lng'];
            $map->save();
            $links=explode(",",$value['links']);
            
            foreach($links as $link){
                $social=new SocialLink;
                $social->link=$link;
                $social->google_map_id=$map->id;
                $social->save();
            }
           
            
        }
        return "ssss";
        return view('admin.pages.import');
    
    }
    public function get_marker(){
        $markers=GoogleMap::with('links')->get();
        return response()->json(['markers'=>$markers]);
    }
}
