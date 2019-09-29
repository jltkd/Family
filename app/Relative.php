<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relative extends Model
{
    protected $dates = [
        'birthdate',
    ];

    protected $fillable = [
        'profile_image',
        'first_name',
        'last_name',
        'birthdate',
        'relation',
        'phone',
        'email',
        'address',
        'city',
        'state',
        'postal_code',
    ];
}
