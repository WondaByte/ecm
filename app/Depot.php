<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depot extends Model
{
    //
	 
    protected $table = 'depots';
    protected $primaryKey = 'depot_id';

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
