<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'product_order';
    public $timestamps = false;
    public function Order()
    {
        return $this->hasMany('App\models\productOrd', 'order_id', 'id');
    }
}
