<?php

namespace App\Http\Livewire\Contact\School;

use Livewire\Component;
use App\Models\School\Filter AS SchoolFilter;
use App\Models\School\{
    Association,
    Children,
    Handicap,
    Language,
    RentalPerPerson,
    RentalDuration,
    StoragePerPerson,
    StorageDuration,
};
class Filter extends Component
{
    public $filters, $school;

    protected $rules = [
        'filters.*.sports' => 'required',
        'filters.*.start_date' => 'required|date',
        'filters.*.end_date' => 'required|date',
        'filters.*.price' => 'required|regex:/^\d{1,}+([.]+[\d{1,2}])?$/',
        'filters.*.student_teacher_ratio' => 'required|integer',
        'filters.*.association' => 'required|array',
        'filters.*.handicap' => 'required|array',
        'filters.*.rental.rentalPerPerson' => 'required|array',
        'filters.*.rental.duration' => 'required|array',
        'filters.*.storage.rentalPerPerson' => 'required|array',
        'filters.*.storage.duration' => 'required|array',
        'filters.*.children' => 'required|array',
        'filters.*.language' => 'required|array',
        'filters.*.courseLevel' => 'required'
    ];

    protected $messages = [
        'filters.*.sports.required' => 'Sports is required',
        'filters.*.start_date.required' => 'Start Date is required',
        'filters.*.start_date.date' => 'Start Date should be date',
        'filters.*.end_date.required' => 'End Date is required',
        'filters.*.end_date.date' => 'End Date should be date',
        'filters.*.price.required' => 'Price is required',
        'filters.*.price.double' => 'Price should be number',
        'filters.*.student_teacher_ratio.required' => 'Student Teacher Ratio is required',
        'filters.*.student_teacher_ratio.integer' => 'Student Teacher Ratio is required',
        'filters.*.association.required' => 'Association is required',
        'filters.*.handicap.required' => 'Handicap is required',
        'filters.*.rental.rentalPerPerson.required' => 'Rental Per Person is required',
        'filters.*.rental.duration.required' => 'Duration is required',
        'filters.*.storage.rentalPerPerson.required' => 'Rental Per Person is required',
        'filters.*.storage.duration.required' => 'Duration is required',
        'filters.*.children.required' => 'Children is required',
        'filters.*.language.required' => 'Language is required',
        'filters.*.courseLevel.required' => 'Course Level is required'
    ];

    public function mount($school){
        $school = $this->school;
        $this->filters = [];
        $this->addFilter();
    }

    public function render(){
        $this->dispatchBrowserEvent('livewire-reload');
        return view('livewire.contact.school.filter');
    }

    public function updated($propName){
        $this->validateOnly($propName);
    }

    public function saveChanges(){
        $this->validate();
        foreach($this->filters as $filter){
            // add Filter
            $schoolFilter = new SchoolFilter;
            $schoolFilter->school_id = $this->school->id;
            $schoolFilter->sports = $filter['sports'];
            $schoolFilter->start_date = $filter['start_date'];
            $schoolFilter->end_date = $filter['end_date'];
            $schoolFilter->price = $filter['price'];
            $schoolFilter->student_teacher_ratio = $filter['student_teacher_ratio'];
            $schoolFilter->course_level = $filter['course_level'];
            $schoolFilter->is_lesson = $filter['lesson'];
            $schoolFilter->is_camp = $filter['camp'];
            $schoolFilter->save();

            // association
            foreach($filter['association'] as $value){
                $association = new Association;
                $association->school_filter_id = $schoolFilter->id;
                $association->name = $value;
                $association->save();
            }

            // children
            foreach($filter['children'] as $value){
                $children = new Children;
                $children->school_filter_id = $schoolFilter->id;
                $children->name = $value;
                $children->save();
            }

            // handicap
            foreach($filter['handicap'] as $value){
                $handicap = new Handicap;
                $handicap->school_filter_id = $schoolFilter->id;
                $handicap->name = $value;
                $handicap->save();
            }

            // language
            foreach($filter['language'] as $value){
                $language = new Language;
                $language->school_filter_id = $schoolFilter->id;
                $language->name = $value;
                $language->save();
            }

            // rentalPerPerson
            foreach($filter['rental']['rentalPerPerson'] as $value){
                $rentalPerPerson = new rentalPerPerson;
                $rentalPerPerson->school_filter_id = $schoolFilter->id;
                $rentalPerPerson->name = $value;
                $rentalPerPerson->save();
            }

            // storagePerPerson
            foreach($filter['storage']['rentalPerPerson'] as $value){
                $storagePerPerson = new StoragePerPerson;
                $storagePerPerson->school_filter_id = $schoolFilter->id;
                $storagePerPerson->name = $value;
                $storagePerPerson->save();
            }

            // rentalDuration
            foreach($filter['rental']['duration'] as $value){
                $rentalDuration = new RentalDuration;
                $rentalDuration->school_filter_id = $schoolFilter->id;
                $rentalDuration->name = $value;
                $rentalDuration->save();
            }

            // storageDuration
            foreach($filter['storage']['duration'] as $value){
                $storageDuration = new StorageDuration;
                $storageDuration->school_filter_id = $schoolFilter->id;
                $storageDuration->name = $value;
                $storageDuration->save();
            }

        }
    }

    public function addFilter(){
        $today = now()->format("Y-m-d");
        $rental = [
            "rentalPerPerson" => [],
            "duration" => []
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
            'course_level' => "",
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
