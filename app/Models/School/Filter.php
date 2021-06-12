<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filter extends Model
{
    use HasFactory;

    // sports
    public function sports(){
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
}
