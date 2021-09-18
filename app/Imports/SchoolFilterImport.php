<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\School;
use App\Models\School\Filter;

class SchoolFilterImport implements ToCollection, WithHeadingRow
{

    public function rules(){
        return [
            'watersport_school_name' => 'required'
        ];
    }

    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //
        // dd($collection);
        foreach ($collection as $row) {
            # code...
            // dd($row);
            if(isset($row['watersport_school_name']) && !empty($row['watersport_school_name'])){
                $geo_location = $row['geo_location'];
                $row['phone'] = explode("\n", $row['phone'])[0];
                $row['phone'] = substr($row['phone'], 0, 19);
                $row['email'] = explode("\n", $row['email'])[0];
                if(strpos($geo_location, ", ") != false){
                    $geo_location = explode(", ", $geo_location);
                }
                else {
                    $geo_location = str_replace("'' N", "", $geo_location);
                    $geo_location = str_replace("'' E", "", $geo_location);
                    $geo_location = str_replace('.', "", $geo_location);
                    $geo_location = str_replace('° ', "", $geo_location);
                    $geo_location = str_replace("' ", "", $geo_location);
                    $geo_location = str_replace("\n", "", $geo_location);
                    $geo_location = explode(" ", $geo_location);
                }
                $school = new School;
                $school->name = $row['watersport_school_name'];
                $school->name = $row['owners_name'];
                $school->website = $row['websiteurl'];
                $school->email = $row['email'];
                $school->phone = $row['phone'];
                $school->country = $row['country'];
                $school->address = $row['address']??"";
                $school->longitude = $geo_location[0]??"";
                $school->latitude = $geo_location[1]??"";
                if($school->save()){
                    foreach ($row as $key => $value) {
                        if($value === "X"){
                            $filter = new Filter;
                            $filter->school_id = $school->id;
                            $filter->sports = $key;
                            $filter->save();
                        }
                    }
                }
            }
        }
    }
}
