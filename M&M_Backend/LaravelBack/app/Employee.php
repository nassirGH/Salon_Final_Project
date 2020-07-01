<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Service;
use App\EmployeeService;

class Employee extends Model
{
    protected $table = "employee";

    protected $fillable = [
        'name',
        'role', 
        'password',
        'phone_number',  
    ];


    public function services()
    {    
        return $this->belongsToMany(Service::class, 'employee_service', 'service_id', 'employee_id');
    }
}
