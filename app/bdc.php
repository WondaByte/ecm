<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bdc extends Model
{
    protected $table = 'bdcs';
    protected $primaryKey = 'bdc_id';

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
