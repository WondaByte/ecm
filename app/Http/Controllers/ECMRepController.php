<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Bank;
use App\Bdc;
use App\Report;
use App\Constant;

class ECMRepController extends Controller
{
    //
   public function dashboard()
    {
    	$products = Product::all();
    	$bdcs = Bdc::all();
    	$banks = Bank::all();
    	return view('pages.ecmRep-dashboard', compact('products', 'bdcs', 'banks'));
    }

    public function storeConstants(Request $request)
    {
        $request->session()->put('product_id', $request->product_id);
    	$request->session()->put('bdc_id', $request->bdc_id);
        $request->session()->put('bank_id', $request->bank_id);
        $request->session()->put('shore_tank_number', $request->shore_tank_number);
        
        return response()->json(['error' => false, 'message' => 'Submitted successfully']);
    }

    public function submitReport(Request $request)
    {
        // retrieve constants stored in session
        $request['product_id'] = $request->session()->get('product_id');
        $request['bdc_id']  = $request->session()->get('bdc_id');
        $request['bank_id'] = $request->session()->get('bank_id');
        $request['shore_tank_number'] = $request->session()->get('shore_tank_number');

        // get the vcf factor of the particular product
        $vcf = Constant::where('product_id', $request['product_id'])->value('vcf');
        $density = Constant::where('product_id', $request['product_id'])->value('density');
        $obs_temp = Constant::where('product_id', $request['product_id'])->value('obs_temperature');

        $request['litres_at_15_deg'] = round(($request->obs_litres * $vcf), 2);
        $request['metric_tons_vac'] = round((($request['litres_at_15_deg'] * $density) / 1000), 2);
        $request['metric_tons_air'] = round((($request['litres_at_15_deg'] / 1000) * ($density - 0.0011)), 2);
        $request['user_id'] = Auth::user()->user_id;

        $report = Report::create($request->all());
        return response()->json(['error' => false, 'message' => 'Report submitted successfully']);
    }
}
