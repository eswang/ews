<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Mass assignment support.
    protected $fillable = [
        'name',
        'address',
        'city',
        'state',
        'zipcode',
        'phone',
        'value'
    ];
}
