<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
	protected $table = 'products';
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product_name', 'quantity', 'bank_id', 'bdc_id', 'depot_id',
    ];

    public static function getProducts()
    {
    	return self::paginate(20);
    }

    public function constant()
    {
        return $this->hasOne('App\Constant');
    }

    public function depot()    
    {
        return $this->belongsTo('App\Depot', 'depot_id');
    }

    public function bdc()
    {
        return $this->belongsTo('App\Bdc', 'bdc_id');
    }
    public function bank()
    {
        return $this->belongsTo('App\Bank', 'bank_id');
    }

    public function lc()
    {
        return $this->hasOne('App\Lc', 'lc_id', 'lc_id');
    }
}
