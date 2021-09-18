<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory;
    protected $table = "school_filters";

    // sports
    public function sports($withKeys = false){
        return [
            "Wingsup", "Wingfoildiving", "Wingsurfing",
            "Kitesurfing", "Kitefoildiving", "Snowkiting",
            "Windsurfing", "Sup", "Yacht", "Catamaran",
            "Yawl", "Surfing", "Diving"
        ];
    }

    // association
    public function association(){
        return [
            "IKO", "VDWS", "No Association"
        ];
    }

    // handicap
    public function handicap(){
        return [
            "Blind", "Deaf", "Deaf/Mute",
            "Waist up", "Waist down"
        ];
    }

    // course level
    public function courseLevel(){
        return [
            "Beginner", "Intermediate"
        ];
    }

    // rental per person
    public function rentalPerPerson(){
        return [
            "1 Set", "2 Set", "3 Set"
        ];
    }

    // duration
    public function duration(){
        return [
            "1 hour", "2 hours", "3 hours", "Half day",
            "Day", "2 days", "3 days", "4 days", "5 days",
            "Week", "10 days", "2 weeks", "3 weeks"
        ];
    }

    public function associations(){
        return $this->hasMany(Association::class, 'school_filter_id');
    }

    public function children(){
        return $this->hasMany(Children::class, 'school_filter_id');
    }

    public function handicaps(){
        return $this->hasMany(Handicap::class, 'school_filter_id');
    }

    public function languages(){
        return $this->hasMany(Language::class, 'school_filter_id');
    }

    public function rentalDuration(){
        return $this->hasMany(RentalDuration::class, 'school_filter_id');
    }

    public function rentalPerPersons(){
        return $this->hasMany(RentalPerPerson::class, 'school_filter_id');
    }

    public function storageDuration(){
        return $this->hasMany(StorageDuration::class, 'school_filter_id');
    }

    public function storagePerPerson(){
        return $this->hasMany(StoragePerPerson::class, 'school_filter_id');
    }

}
