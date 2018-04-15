<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    //
    protected $table 	  = 'banks';
    protected $primaryKey = 'bank_id';

    protected $fillable   = [ 'name', 'address', 'phone'];

    public $timestamps = false; 

    public function products()        
    {
    	return $this->hasMany('App\Product');
    }

    public static function getBanks()
    {
    	return self::paginate(20);
    }
}
