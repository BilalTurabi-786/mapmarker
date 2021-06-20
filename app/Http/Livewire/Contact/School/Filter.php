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
    public $filters, $school, $deleted_ids;

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
        'filters.*.course_level' => 'required'
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
        'filters.*.course_level.required' => 'Course Level is required'
    ];

    public function mount($school){
        $school = $this->school;
        $this->filters = [];
        $filters = SchoolFilter::query()
        ->where('school_id', $school->id)
        ->with([
            'associations:id,school_filter_id,name', 'children:id,school_filter_id,name', 'handicaps:id,school_filter_id,name', 'languages:id,school_filter_id,name', 'rentalDuration:id,school_filter_id,name',
            'rentalPerPersons:id,school_filter_id,name', 'storageDuration:id,school_filter_id,name', 'storagePerPerson:id,school_filter_id,name'
        ])->get();
        $this->deleted_ids = [];
        if($filters->count() > 0){
            foreach ($filters as $filter) {
                $this->filters[] = [
                    'filter_id' => $filter->id,
                    'sports' => $filter->sports,
                    'start_date' => $filter->start_date,
                    'end_date' => $filter->end_date,
                    'price' => $filter->price,
                    'student_teacher_ratio' => $filter->student_teacher_ratio,
                    'association' => $filter->associations->pluck('name')->toArray(),
                    'handicap' => $filter->handicaps->pluck('name')->toArray(),
                    'rental' => [
                        "rentalPerPerson" => $filter->rentalPerPersons->pluck('name')->toArray(),
                        "duration" => $filter->rentalDuration->pluck('name')->toArray()
                    ],
                    'storage' => [
                        "rentalPerPerson" => $filter->storagePerPerson->pluck('name')->toArray(),
                        "duration" => $filter->storageDuration->pluck('name')->toArray()
                    ],
                    'children' => $filter->children->pluck('name')->toArray(),
                    'language' => $filter->languages->pluck('name')->toArray(),
                    'course_level' => $filter->course_level,
                    'lesson' => $filter->is_lesson,
                    'camp' => $filter->is_camp
                ];
            }
        }
        else{
            $this->addFilter();
        }
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
            $schoolFilter = null;
            if(isset($filter['filter_id'])){
                $schoolFilter = SchoolFilter::find($filter['filter_id']);
            }
            if(!is_object($schoolFilter)){
                $schoolFilter = new SchoolFilter;
            }
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
                $association = Association::where('id', $schoolFilter->id)->first();
                if(!is_object($association)){
                    $association = new Association;
                }
                // $association = new Association;
                $association->school_filter_id = $schoolFilter->id;
                $association->name = $value;
                $association->save();
            }

            // children
            foreach($filter['children'] as $value){
                $children = Children::where('id', $schoolFilter->id)->first();
                if(!is_object($children)){
                    $children = new Children;
                }
                // $children = new Children;
                $children->school_filter_id = $schoolFilter->id;
                $children->name = $value;
                $children->save();
            }

            // handicap
            foreach($filter['handicap'] as $value){
                $handicap = Handicap::where('id', $schoolFilter->id)->first();
                if(!is_object($handicap)){
                    $handicap = new Handicap;
                }
                // $handicap = new Handicap;
                $handicap->school_filter_id = $schoolFilter->id;
                $handicap->name = $value;
                $handicap->save();
            }

            // language
            foreach($filter['language'] as $value){
                $language = Language::where('id', $schoolFilter->id)->first();
                if(!is_object($language)){
                    $language = new Language;
                }
                // $language = new Language;
                $language->school_filter_id = $schoolFilter->id;
                $language->name = $value;
                $language->save();
            }

            // rentalPerPerson
            foreach($filter['rental']['rentalPerPerson'] as $value){
                $rentalPerPerson = rentalPerPerson::where('id', $schoolFilter->id)->first();
                if(!is_object($rentalPerPerson)){
                    $rentalPerPerson = new rentalPerPerson;
                }
                // $rentalPerPerson = new rentalPerPerson;
                $rentalPerPerson->school_filter_id = $schoolFilter->id;
                $rentalPerPerson->name = $value;
                $rentalPerPerson->save();
            }

            // storagePerPerson
            foreach($filter['storage']['rentalPerPerson'] as $value){
                $storagePerPerson = StoragePerPerson::where('id', $schoolFilter->id)->first();
                if(!is_object($storagePerPerson)){
                    $storagePerPerson = new StoragePerPerson;
                }
                // $storagePerPerson = new StoragePerPerson;
                $storagePerPerson->school_filter_id = $schoolFilter->id;
                $storagePerPerson->name = $value;
                $storagePerPerson->save();
            }

            // rentalDuration
            foreach($filter['rental']['duration'] as $value){
                $rentalDuration = RentalDuration::where('id', $schoolFilter->id)->first();
                if(!is_object($rentalDuration)){
                    $rentalDuration = new RentalDuration;
                }
                // $rentalDuration = new RentalDuration;
                $rentalDuration->school_filter_id = $schoolFilter->id;
                $rentalDuration->name = $value;
                $rentalDuration->save();
            }

            // storageDuration
            foreach($filter['storage']['duration'] as $value){
                $storageDuration = StorageDuration::where('id', $schoolFilter->id)->first();
                if(!is_object($storageDuration)){
                    $storageDuration = new StorageDuration;
                }
                //$storageDuration = new StorageDuration;
                $storageDuration->school_filter_id = $schoolFilter->id;
                $storageDuration->name = $value;
                $storageDuration->save();
            }
        }
        SchoolFilter::destroy($this->deleted_ids);
        return redirect()->route('client.school');
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
            'camp' => false
        ];
    }

    public function removeFilter($i){
        // if(isset($this->filters[$i]))
        if(isset($this->filters[$i]['filter_id'])) $this->deleted_ids[] = $this->filters[$i]['filter_id'];
        unset($this->filters[$i]);
        $this->filters = array_values($this->filters);
    }

}
