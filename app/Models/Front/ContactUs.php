<?php

namespace App\Models\Front;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Filter;

class ContactUs extends Authenticatable
{
    use HasFactory;

    public function filters(){
        return $this->hasMany(Filter::class, 'user_id');
    }

}
 