<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Mass assignment support.
    protected $fillable = [
        'name',
        'description',
        'width',
        'length',
        'height',
        'weight',
        'value',
    ];
}
