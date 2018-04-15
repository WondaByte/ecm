<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lc extends Model
{
    
    protected $table = 'lc';
    protected $primaryKey = 'lc_id';

    protected $fillabe = ['lc_reference', 'lc_value', 'supplier', 'date_issued', 'date_expired', 'port'];

    public function product()
    {
    	return $this->belongsTo('App\Product', 'lc_id');
    }

    public static function getLcs()
    {
    	return self::paginate(20);
    }
}
