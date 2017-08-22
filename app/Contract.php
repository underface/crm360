<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
