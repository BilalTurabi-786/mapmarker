<?php



namespace App\Http\Livewire;



use Livewire\Component;
use App\Models\Language;


class Filters extends Component
{

    public $sample, $persons, $activePerson, $toggle;


    public function render(){

        return view('livewire.filters');

    }


    public function addFilter($value){

        $this->persons[$this->activePerson]["lesson_type"] = $value;

    }



    // reset

    public function resetFilters(){

        $this->persons[$this->activePerson] = $this->sample;

    }



    public function resetFilter($type, $childType = null, $index = null){

        if($childType != null && $index != null){
            if(!is_array($this->persons[$this->activePerson][$type][$childType]) || count($this->persons[$this->activePerson][$type][$childType]) == 1){
                $this->persons[$this->activePerson][$type][$childType] = $this->sample[$type][$childType];
                return;
            }
            unset($this->persons[$this->activePerson][$type][$childType][$index]);
            $this->persons[$this->activePerson][$type][$childType] = array_values($this->persons[$this->activePerson][$type][$childType]);
        }
        else if($childType != null){
            if(count($this->persons[$this->activePerson][$type]) == 1){
                $this->persons[$this->activePerson][$type] = $this->sample[$type];
                return;
            }
            unset($this->persons[$this->activePerson][$type][$childType]);
            $this->persons[$this->activePerson][$type] = array_values($this->persons[$this->activePerson][$type]);
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

            "handicap" => ["No"],

            "children" => ["No"],

            "storage" => [

                "rentalPerPerson" => "",

                "duration" => ["All"],

            ],

            "rental" => [

                "rentalPerPerson" => "",

                "duration" => ["All"],

            ],

            "lessons" => false,

            "camp" => false

        ];

        $this->persons = [

            $this->sample
        ];

        $this->toggle = [false, false, false];

    }

    public function addNewPerson(){
        $i = count($this->persons);
        $this->persons[$i] = $this->sample;
        $this->activePerson = $i;
    }

    public function toggleFilter($key){
        $this->persons[$this->activePerson][$key] = !$this->persons[$this->activePerson][$key];
    }

    public function setChildren($children, $isChecked){
        $flag = 0;
        $pos = array_search("No", $this->persons[$this->activePerson]["children"]);

        if($children != "No" && $pos !== false){
            unset($this->persons[$this->activePerson]["children"][$pos]);
            $flag = 1;
        }
        else if($children == "No" && $isChecked && $pos === false){
            $this->persons[$this->activePerson]["children"] = ["No"];
            return;
        }

        if($isChecked){
            $this->persons[$this->activePerson]["children"][] = $children;
        }
        else{
            $pos = array_search($children, $this->persons[$this->activePerson]["children"]);
            if(isset($this->persons[$this->activePerson]["children"][$pos])){
                unset($this->persons[$this->activePerson]["children"][$pos]);
                $flag = 1;
            }
            if(count($this->persons[$this->activePerson]["children"]) == 0){
                $this->persons[$this->activePerson]["children"] = $this->sample["children"];
            }
        }

        if($flag){
            $this->persons[$this->activePerson]["children"] = array_values($this->persons[$this->activePerson]["children"]);
        }

    }

    public function setAssociation($association, $isChecked){
        $flag = 0;
        $pos = array_search("All", $this->persons[$this->activePerson]["association"]);
        if($association != "All" && $pos !== false){
            unset($this->persons[$this->activePerson]["association"][$pos]);
            $flag = 1;
        }
        else if($association == "All" && $isChecked && $pos === false){
            $this->persons[$this->activePerson]["association"] = ["All"];
            return;
        }

        if($isChecked){
            $this->persons[$this->activePerson]["association"][] = $association;
        }
        else{
            $pos = array_search($association, $this->persons[$this->activePerson]["association"]);
            if(isset($this->persons[$this->activePerson]["association"][$pos])){
                unset($this->persons[$this->activePerson]["association"][$pos]);
                $flag = 1;
            }
            if(count($this->persons[$this->activePerson]["association"]) == 0){
                $this->persons[$this->activePerson]["association"] = $this->sample["association"];
            }
        }
        if($flag){
            $this->persons[$this->activePerson]["association"] = array_values($this->persons[$this->activePerson]["association"]);
        }
    }

    public function setHandicap($handicap, $isChecked){
        $flag = 0;
        $pos = array_search("No", $this->persons[$this->activePerson]["handicap"]);
        if($handicap != "No" && $pos !== false){
            unset($this->persons[$this->activePerson]["handicap"][$pos]);
            $flag = 1;
        }
        else if($handicap == "No" && $isChecked && $pos === false){
            $this->persons[$this->activePerson]["handicap"] = ["No"];
            return;
        }
        if($isChecked){
            $this->persons[$this->activePerson]["handicap"][] = $handicap;
        }
        else{
            $pos = array_search($handicap, $this->persons[$this->activePerson]["handicap"]);
            if(isset($this->persons[$this->activePerson]["handicap"][$pos])){
                unset($this->persons[$this->activePerson]["handicap"][$pos]);
                $flag = 1;
            }
            if(count($this->persons[$this->activePerson]["handicap"]) == 0){
                $this->persons[$this->activePerson]["handicap"] = $this->sample["handicap"];
            }
        }

        if($flag){
            $this->persons[$this->activePerson]["handicap"] = array_values($this->persons[$this->activePerson]["handicap"]);
        }

    }

    public function setStorageDuration($duration, $isChecked){
        $flag = 0;
        $pos = array_search("All", $this->persons[$this->activePerson]["storage"]["duration"]);
        if($duration != "All" && $pos !== false){
            unset($this->persons[$this->activePerson]["storage"]["duration"][$pos]);
            $flag = 1;
        }
        else if($duration == "All" && $isChecked && $pos === false){
            $this->persons[$this->activePerson]["storage"]["duration"] = ["All"];
            return;
        }
        if($isChecked){
            $this->persons[$this->activePerson]["storage"]["duration"][] = $duration;
        }
        else{
            $pos = array_search($duration, $this->persons[$this->activePerson]["storage"]["duration"]);
            if(isset($this->persons[$this->activePerson]["storage"]["duration"][$pos])){
                unset($this->persons[$this->activePerson]["storage"]["duration"][$pos]);
                $flag = 1;
            }
            if(count($this->persons[$this->activePerson]["storage"]["duration"]) == 0){
                $this->persons[$this->activePerson]["storage"]["duration"] = $this->sample["storage"]["duration"];
            }
        }

        if($flag){
            $this->persons[$this->activePerson]["storage"]["duration"] = array_values($this->persons[$this->activePerson]["storage"]["duration"]);
        }

    }

    public function setRentalDuration($duration, $isChecked){
        $flag = 0;
        $pos = array_search("All", $this->persons[$this->activePerson]["rental"]["duration"]);
        if($duration != "All" && $pos !== false){
            unset($this->persons[$this->activePerson]["rental"]["duration"][$pos]);
            $flag = 1;
        }
        else if($duration == "All" && $isChecked && $pos === false){
            $this->persons[$this->activePerson]["rental"]["duration"] = ["All"];
            return;
        }
        if($isChecked){
            $this->persons[$this->activePerson]["rental"]["duration"][] = $duration;
        }
        else{
            $pos = array_search($duration, $this->persons[$this->activePerson]["rental"]["duration"]);
            if(isset($this->persons[$this->activePerson]["rental"]["duration"][$pos])){
                unset($this->persons[$this->activePerson]["rental"]["duration"][$pos]);
                $flag = 1;
            }
            if(count($this->persons[$this->activePerson]["rental"]["duration"]) == 0){
                $this->persons[$this->activePerson]["rental"]["duration"] = $this->sample["rental"]["duration"];
            }
        }

        if($flag){
            $this->persons[$this->activePerson]["rental"]["duration"] = array_values($this->persons[$this->activePerson]["rental"]["duration"]);
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

