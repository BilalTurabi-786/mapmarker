<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Filters extends Component
{
    public $sample, $persons, $activePerson, $toggle;

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

    public function resetFilter($type, $childType = null){
        if($childType != null){
            $this->persons[$this->activePerson][$type][$childType] = $this->sample[$type][$childType];

        }
        else{
            $this->persons[$this->activePerson][$type] = $this->sample[$type];
        }
    }

    // mount
    public function mount(){
        $this->activePerson = 0;
        $this->sample = [
            "lesson_type" => "",
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
        $this->toggle = [false, false, false];
    }

    public function updatedActivePerson(){
        if(empty($this->persons[$this->activePerson])){
            $this->persons[$this->activePerson] = $this->sample;
        }
        foreach($this->toggle as $key => $value){
            if($key == $this->activePerson){
                $this->toggle[$this->activePerson] = !$this->toggle[$this->activePerson];
                continue;
            }
            $this->toggle[$key] = false;
        }
    }
}
