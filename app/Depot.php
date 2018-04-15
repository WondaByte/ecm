<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depot extends Model
{
    //
	 
    protected $table = 'depots';
    protected $primaryKey = 'depot_id';
    protected $fillable = ['name', 'location', 'phone', 'user_id'];

    public function user()
    {
    	return $this->hasOne('App\User', 'user_id', 'user_id');
    }

    public function products()
    {
    	return $this->hasMany('App\Product');
    }

    public static function getDepots()
    {
    	return self::paginate(20);
    }
}
