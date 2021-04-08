<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Filters extends Component
{
    public $sample, $persons, $activePerson;

    public function render(){
        return view('livewire.filters');
    }

    public function getTime($date){
        return \Carbon\Carbon::parse('01 '.$date)->timestamp;
    }

    public function addFilter($value){
        $this->persons[$this->activePerson]["lesson_type"] = $value;
    }

    // reset
    public function resetFilters(){
        $this->persons[$this->activePerson] = $this->sample;
    }

    // mount
    public function mount(){
        $this->sample = [
            "lesson" => "",
            "duration" => "March 2010-January 2021",
            "price" => "$130 - $250",
            "pricePerHour" => "$130 - $250",
            "studentTeacherRatio" => "130 - 250",
            "association" => ["all"],
            "handicap" => ["no"],
            "children" => ["no"],
            "storage" => [
                "duration" => ["all"],
                "pricePerDay" => "$0 - $200"
            ],
            "rental" => [
                "rentalPerPerson" => [],
                "duration" => ["all"],
                "pricePerHour" => "$0 - $200"
            ],
            "lessons" => [
                "studentTeacherRatio" => "1 - 10",
                "duration" => "Days1 - Days10",
                "courseHours" => "0 - 40",
                "pricePerTeachingHours" => "$0 - $200",
            ],
            "camp" => [
                "studentTeacherRatio" => "1 - 10",
                "duration" => "Days1 - Days10",
                "courseHours" => "0 - 40",
                "pricePerTeachingHours" => "$0 - $200",
            ],
            "courseLevel" => "all"
        ];
        $this->persons = [
            $this->sample,
            [],
            []
        ];
        $this->activePerson = 1;
    }
}
