<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class productOrd extends Model
{
    protected $table ='order';
    public function productOrd()
    {
        return $this->belongsTo('App\models\Order', 'order_id', 'id');
    }
}
