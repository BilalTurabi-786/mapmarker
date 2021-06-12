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
        $this->filters[] = [
            ''
        ];
    }

    public function removeFilter($i){
        // if(isset($this->filters[$i]))
        unset($this->filters[$i]);
        $this->filters = array_values($this->filters);
    }

}
