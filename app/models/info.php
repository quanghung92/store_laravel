<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class info extends Model
{
    public function roles()
    {
        return $this->belongsTo('App\models\user', 'user_id', 'id');
    }
}
