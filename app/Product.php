<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function product_orders()
    {
        return $this->hasMany('App\ProductOrder');
    }
}
