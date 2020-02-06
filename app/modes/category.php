<?php

namespace App\modes;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table='category';
    public $timestamps=false;
    // liên kết 1 nhiều tới product
    public function product()
    {
        return $this->hasMany('App\models\product', 'category_id', 'id');
    }
}
