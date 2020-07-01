<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserServiceType extends Model
{
    protected $table = "user_service_type";

    protected $fillable = 
    [
        "user_id",
        "service_type_id",
    ];
}
