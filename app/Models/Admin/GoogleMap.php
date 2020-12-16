<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoogleMap extends Model
{
    use HasFactory;
    public function links(){
        return $this->hasMany(SocialLink::class,);
    }
}
