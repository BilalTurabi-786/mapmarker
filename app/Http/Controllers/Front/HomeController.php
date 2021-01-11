<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Filter;

class HomeController extends Controller
{
    //
    public function index(){
        $filters=Filter::all();
    return view('clientside.page.map',['filters'=>$filters]);

    }
}
