<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function product_orders()
    {
        return $this->hasMany('App\ProductOrder');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
