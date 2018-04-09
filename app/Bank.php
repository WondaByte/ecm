<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    //
    protected $table = 'banks';
    protected $primaryKey = 'bank_id';

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
