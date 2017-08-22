<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    public function contracts()
    {
        return $this->hasMany('App\Contract');
    }
}
