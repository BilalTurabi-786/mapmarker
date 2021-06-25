<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    public function contactUs(){
        return $this->belongsTo(Front\ContactUs::class);
    }

    public function filters(){
        return $this->hasMany(School\Filter::class);
    }

}
