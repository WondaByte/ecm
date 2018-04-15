<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
    	'vehicle_number',
    	'driver_name',
    	'shore_tank_number',
    	'order_number',
    	'waybill_number',
    	'customer',
    	'obs_litres',
    	'litres_at_15_deg',
    	'metric_tons_vac',
    	'metric_tons_air',
    	'product_id',
    	'user_id',
    ];

    protected $table = 'reports';
    protected $primaryKey = 'report_id';

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }

    public static function dailyStockTaking()
    {
        return self::orderBy('created_at', 'desc')->paginate(20);
    }
}
