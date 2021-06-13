<?php

namespace App\Http\Livewire\Contact\School;

use Livewire\Component;

class Filter extends Component
{
    public $filters;

    public function mount(){
        $this->filters = [];
        $this->addFilter();
    }

    public function render(){
        $this->dispatchBrowserEvent('livewire-reload');
        return view('livewire.contact.school.filter');
    }

    public function addFilter(){
        $today = now()->format("Y-m-d");
        $rental = [
            "rentalPerPerson" => "",
            "duration" => ""
        ];
        $this->filters[] = [
            'sports' => '',
            'start_date' => $today,
            'end_date' => $today,
            'price' => 1,
            'student_teacher_ratio' => 1,
            'association' => [],
            'handicap' => [],
            'rental' => $rental,
            'storage' => $rental,
            'children' => [],
            'language' => [],
            'courseLevel' => "",
            'lesson' => false,
            'course' => false
        ];
    }

    public function removeFilter($i){
        // if(isset($this->filters[$i]))
        unset($this->filters[$i]);
        $this->filters = array_values($this->filters);
    }

}
