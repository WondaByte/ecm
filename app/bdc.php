<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Report;

class Bdc extends Model
{
    protected $table = 'bdcs';
   	protected $primaryKey = 'bdc_id';
   	protected $fillable = ['name', 'address', 'phone', 'bank_id'];

   	public function products()        
    {
    	return $this->hasMany('App\Product');
    }

    public static function getBdcs()
    {
    	return self::paginate(20);
    }

    public static function getReports()
    {
       
    }
}
