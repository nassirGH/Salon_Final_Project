<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Booking;
use App\Service;
use App\User;

class ServiceType extends Model
{
    protected $table = "service_type";

    protected $fillable = 
    [
        "name"
    ];


    public function bookings()
    {    
        return $this->hasMany(Booking::class,'type_id','id');
    }

  
    public function services()
    {    
        return $this->hasMany(Service::class,'id','service_id');
    }

    public function users()
    {    
        return $this->hasMany(User::class, 'user_service_type', 'user_id','service_type_id');
    }
}
