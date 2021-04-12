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

            "courseLevel" => "All",
            
            "association" => ["All"],

            "handicap" => ["no"],

            "children" => ["no"],

            "storage" => [

                "rentalPerPerson" => "",

                "duration" => ["All"],

            ],

            "rental" => [

                "rentalPerPerson" => "",

                "duration" => ["All"],

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

            ]

        ];

        $this->persons = [

            $this->sample,

            [],

            []

        ];

        $this->toggle = [false, false, false];

    }

    public function setCourseLevel($courseLevel, $isChecked){
        if($isChecked){
            $this->persons[$this->activePerson]["courseLevel"][] = $courseLevel;
        }
        else{
            $pos = array_search($courseLevel, $this->persons[$this->activePerson]["courseLevel"]);
            if(isset($this->persons[$this->activePerson]["courseLevel"][$pos])) unset($this->persons[$this->activePerson]["courseLevel"][$pos]);
        }

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

