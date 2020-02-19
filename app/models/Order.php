<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    public function productOrd()
    {
        return $this->hasMany('App\models\productOrd', 'order_id', 'id');
    }
}
