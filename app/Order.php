<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function orderedGoods()
    {
        return $this->hasMany('App\OrderedGoods');
    }
}
