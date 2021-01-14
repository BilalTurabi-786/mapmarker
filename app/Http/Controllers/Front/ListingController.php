<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Filter;

class ListingController extends Controller
{
    //
    public function addlisting(){
        $filters=Filter::all();
        return view('clientside.page.addlisting',['filters'=>$filters]);
        
    }
}
