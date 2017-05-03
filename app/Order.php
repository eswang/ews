<?php
// Name: Order.php
// Description: The Laravel model class that will interface with the
// "orders" table in the database.
//
// History:
// Edward Wang   4/19/2017  Created.

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Mass assignment support.
    protected $fillable = [
        'recipient_name',
        'address',
        'city',
        'state',
        'zipcode',
        'phone',
        'product_id',
        'quantity'
    ];
    
    public function products()
    {
        $this->belongsToMany('App\Product');
    }
}
