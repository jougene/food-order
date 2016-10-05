<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderedGoods extends Model
{
    /**
     *
     * Get good item linked with ordered good
     *
     **/

    public function good()
    {
        return $this->hasOne('App\Good');
    }
}
