<?php

namespace App\Http\Livewire\Contact\School;

use Livewire\Component;
use App\Models\School as RequestModel;

class Datatable extends Component
{
    public $search;

    public function mount(){
        $this->search = "";
    }

    public function render()
    {
        return view('livewire.contact.school.datatable', ['requests' => $this->getData()]);
    }

    public function getData(){
        $search = $this->search;
        $schoolReq = RequestModel::where('contact_us_id', auth('contact')->id())->with('contactUs')->whereHas('contactUs', function($query) use ($search){
            $query->when(!empty($search), function($query) use ($search){
                $query->search($search);
            });
        });
        // ->where('is_expired', false)->where('is_rejected', false);
        return $schoolReq->latest()->paginate(10);
    }
}
