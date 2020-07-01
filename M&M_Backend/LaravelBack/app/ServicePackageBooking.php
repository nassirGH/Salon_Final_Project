<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicePackageBooking extends Model
{
    protected $table = "_booking__service__package";

    protected $fillable = 
    [
        'book_id',
        'service_package_id',
    ];
}
