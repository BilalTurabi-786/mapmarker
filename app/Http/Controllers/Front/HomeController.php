<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\School\Filter AS SchoolFilter;
use App\Models\Filter;

class HomeController extends Controller
{
    //
    public function index(){
        // $filters=Filter::all();
        $filters = SchoolFilter::get();
        $data = [];
        // $data['sports'] = array_values($filters->pluck('sports', 'sports')->toArray());
        $data['duration'] = [
            $filters->min('start_date'),
            $filters->max('end_date')
        ];
        $data['price'] = [
            $filters->min('price'),
            $filters->max('price')
        ];
        $data['student_teacher_ratio'] = [
            $filters->min('student_teacher_ratio'),
            $filters->max('student_teacher_ratio')
        ];
        // dd($data);
        // dd([$data, $filters]);
        // return view('clientside.page.map',['filters'=>$filters]);
        return view('clientside.page.map-new',compact('filters','data'));

    }
}
