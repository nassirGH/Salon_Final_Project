<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\ServicePackage;
use App\ServiceType;


class Booking extends Model
{
    protected $table = "booking";

    protected $fillable = [
        'date',
        'is_available',   
    ];


    public function packages()
    {    
        return $this->belongsToMany(ServicePackage::class, '_booking__service__package', 'service_package_id', 'book_id');
    }


    public function serviceTypes()
    {    
        return $this->belongsTo(ServiceType::class,'id','type_id');
    }
}
