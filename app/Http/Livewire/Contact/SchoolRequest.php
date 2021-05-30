<?php

namespace App\Http\Livewire\Contact;

use Livewire\Component;
use App\Models\SchoolRequest as RequestModel;

class SchoolRequest extends Component
{
    public $search;

    public function mount(){
        $this->search = "";
    }

    public function render()
    {
        return view('livewire.contact.school-request', ['requests' => $this->getData()]);
    }

    public function approve($id){
        $requestModel = RequestModel::find($id);
        $requestModel->is_approved = true;
        $requestModel->save();
    }

    public function reject($id){
        $requestModel = RequestModel::find($id);
        $requestModel->is_rejected = true;
        $requestModel->save();
    }

    public function getData(){
        $search = $this->search;
        $schoolReq = RequestModel::with('contactUs')->whereHas('contactUs', function($query) use ($search){
            $query->when(!empty($search), function($query) use ($search){
                $query->search($search);
            });
        });
        // ->where('is_expired', false)->where('is_rejected', false);
        return $schoolReq->latest()->paginate(10);
    }
}
