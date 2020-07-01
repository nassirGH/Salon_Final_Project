<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Booking;
use App\Service;

class ServicePackage extends Model
{
    protected $table = "service_package";

    protected $fillable = [
        'time',
        'price',   
    ];


    public function bookings()
    {    
        return $this->belongsToMany(Booking::class, '_booking__service__package', 'book_id', 'service_package_id');
    }


    public function services()
    {    
        return $this->belongsTo(Service::class,'Service_id','id');
    }
}
