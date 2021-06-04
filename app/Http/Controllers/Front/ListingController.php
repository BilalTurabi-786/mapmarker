<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Filter;
use App\Models\SchoolRequest;

class ListingController extends Controller
{
    //
    public function addlisting(Request $request){
        if(empty($reqest->code)){
            return back()->with('error', 'link expired. Please add another request')->withInput();
        }
        $schoolRequest = SchoolRequest::where(['contact_us_id' => auth('contact')->id(), 'code' => $reqest->code]);
        if(!is_object($schoolRequest)){
            return back()->with('error', 'link expired. Please add another request')->withInput();
        }
        $filters=Filter::all();
        return view('clientside.page.addlisting',['filters'=>$filters, 'schoolRequest' => $schoolRequest]);

    }
}
