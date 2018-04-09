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

    public function depot()
    {
    	return $this->belongsTo('App\Depot', 'depot_id');
    }

    public static function getProducts()
    {
    	return self::paginate(5);
    }

    public function bank()
    {
        return $this->belongsTo('App\Bank', 'bank_id');
    }

    public function bdc()
    {
        return $this->belongsTo('App\Bdc', 'bdc_id');
    }
}
