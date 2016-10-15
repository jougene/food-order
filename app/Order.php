<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function orderedGood()
    {
        return $this->hasMany('App\OrderedGood');
    }
}
