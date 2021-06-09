<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Filter;
use App\Models\SchoolRequest;
use App\Models\School;

class ListingController extends Controller
{
    //
    public function addlisting(Request $request){
        if(empty($request->code)){
            return back()->with('error', 'link expired. Please add another request')->withInput();
        }
        $schoolRequest = SchoolRequest::where(['contact_us_id' => auth('contact')->id(), 'code' => $request->code, 'is_approved' => true, 'is_expired' => false])->first();
        // dd([
        //     $schoolRequest,
        //     SchoolRequest::all()
        // ]);
        if(!is_object($schoolRequest)){
            return back()->with('error', 'link expired. Please add another request')->withInput();
        }
        $filters=Filter::all();
        return view('clientside.page.addlisting', ['filters' => $filters, 'schoolRequest' => $schoolRequest]);
    }

    public function addFilter(Request $request){
        $school = School::where(['contact_us_id' => auth('contact')->id(), 'id' => $request->school_id])->first();
        if(!is_object($school)){
            return back()->with('error', 'School not found');
        }
        return view('clientside.page.addFilter', ['school' => $school]);
    }

}
