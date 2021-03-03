<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Front\ContactUs;

class GoogleMap extends Model
{
    use HasFactory;
    public function links(){
        return $this->hasMany(SocialLink::class,);
    }
    public function user(){
        return $this->belongsTo(ContactUs::class, 'user_id');
    }
}
