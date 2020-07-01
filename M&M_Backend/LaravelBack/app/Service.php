<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Employee;
use App\ServicePackage;

class Service extends Model
{
    protected $table = "service";

    protected $fillable = [
        'name',
        'price', 
        'package',
    ];


    public function employees()
    {    
        return $this->belongsToMany(Employee::class, 'employee_service', 'employee_id', 'service_id');
    }


    public function serviceTypes()
    {    
        return $this->belongsTo(ServiceType::class);
    }

    public function packages()
    {    
        return $this->hasMany(ServicePackage::class,'service_id','id');
    }

 
}