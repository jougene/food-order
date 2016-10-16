<?php

namespace App;

use App\OrderedGood;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function goods()
    {
    	return $this->belongsToMany('App\Good', 'ordered_goods')->withPivot('count');
    }
}
