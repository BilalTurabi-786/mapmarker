<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filter;
use Validator;
use Auth;
class FilterController extends Controller
{
    //
    public function index(){
        $filters=Filter::all();
        return view('admin.pages.filter.filters',['filters'=>$filters]);
    }
    public function add_filter(Request $request){
        $controlls=$request->all();
        if ($request->id!='') {
            $rules=array(
                "filter"=>'required|string|unique:filters,name,'.$request->id,
            );
        }
        else{
            $rules=array(
                "filter"=>'required|string|unique:filters,name'
            );
        }
        
        $validator=Validator::make($controlls,$rules);
        if ($validator->fails()) {
            dd($validator);
            return redirect()->back()->withErrors($validator)->withInput($controlls);
        }else{
            if ($request->id!='') {
            $filter=Filter::find($request->id);
            }
            else{
            $filter=new Filter;

            }
            $filter->name=$request->filter;
            $filter->user_id=Auth::guard('admin')->user()->id;
            $filter->is_admin=1;
            $filter->save();
            return redirect()->back()->withSuccess('Filter Added Successfully');
        }
    }
}
