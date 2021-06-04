<?php

namespace App\Http\Livewire\Contact\School;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\School;

class Add extends Component
{
    use WithFileUploads;

    public $filters, $schoolRequest;

    public $name, $website, $phone, $file, $email, $country, $city, $address, $longitude, $latitude,
        $description, $facebook, $twitter, $youtube, $pinterest, $whatsapp, $skype;

    protected $rules = [
        'name' => "required|max:100",
        'website' => "required|max:255",
        'phone' => "required|digits_between:11,15",
        'email' => "required|max:50",
        'country' => "required|max:100",
        'city' => "required|max:100",
        'address' => "required|max:255",
        'longitude' => "required|max:100",
        'latitude' => "required|max:100",
        'file' => "required|image",
        'description' => "required|max:512",
        'facebook' => "nullable|max:255",
        'twitter' => "nullable|max:255",
        'youtube' => "nullable|max:255",
        'pinterest' => "nullable|max:255",
        'whatsapp' => "nullable|max:255",
        'skype' => "nullable|max:255",
    ];

    public function mount($filters, $schoolRequest){
        $this->filters = $filters;
        $this->schoolRequest = $schoolRequest;
    }

    public function updated($propName){
        $this->validateOnly($propName);
    }

    public function saveChanges(){
        $this->validate();
        $imgName = "IMG-".time()."-".rand().".".$file->getClientOriginalExtension();
        $this->file->storeAs('photos', $imgName);
        $school = new School;
        $school->contact_us_id = auth('contact')->id();
        $school->name = $this->name;
        $school->website = $this->website;
        $school->phone = $this->phone;
        $school->email = $this->email;
        $school->country = $this->country;
        $school->city = $this->city;
        $school->address = $this->address;
        $school->longitude = $this->longitude;
        $school->latitude = $this->latitude;
        $school->description = $this->description;
        $school->image = $this->file;
        $school->facebook = $this->facebook;
        $school->twitter = $this->twitter;
        $school->youtube = $this->youtube;
        $school->pinterest = $this->pinterest;
        $school->whatsapp = $this->whatsapp;
        $school->skype = $this->skype;
        $school->save();
        $this->schoolRequest->code = "";
        $this->schoolRequest->is_approved = false;
        $this->schoolRequest->is_rejected = false;
        $this->schoolRequest->expired = true;
        $this->schoolRequest->save();
        return redirect()->route('/client/dashboard');
        // dd($this);
    }

    public function render()
    {
        return view('livewire.contact.school.add');
    }
}
