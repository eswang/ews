<?php
// Name: Product.php
// Description: The Laravel model class that will interface with the 
// "products" table in the database.
//
// History:
// Edward Wang   4/19/2017  Created.

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
    
    public function orders()
    {
        $this->hasMany('App\Order');
    }
}
