<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderedGood extends Model
{
    /**
     *
     * Get good item linked with ordered good
     *
     **/

    public $timestamps = false;
	
	public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function good()
    {
        return $this->hasOne('App\Good');
    }


}
