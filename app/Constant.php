<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Constant extends Model
{
    //

    protected $fillable = [
    	'density', 'obs_temperature', 'vcf', 'product_id'
    ],

    $table = 'constants',
    $primaryKey = 'id';
	
    public $timestamps = false;

    public function product()
    {
    	return $this->belongsTo('App\Product', 'product_id');
    }
}
