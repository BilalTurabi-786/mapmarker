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

    public function scopeSearch($query, $value){
        return $query->where('name', 'LIKE', '%'.$value.'%')
            ->orWhere('email', 'LIKE', '%'.$value.'%')
            ->orWhere('phone', 'LIKE', '%'.$value.'%')
            ->orWhere('ava_date_one', 'LIKE', '%'.$value.'%')
            ->orWhere('ava_date_two', 'LIKE', '%'.$value.'%')
            ->orWhere('ava_time_one', 'LIKE', '%'.$value.'%')
            ->orWhere('ava_time_two', 'LIKE', '%'.$value.'%');
    }

}
