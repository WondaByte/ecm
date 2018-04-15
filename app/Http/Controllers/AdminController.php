<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Bank;
use App\Product;
use App\Report;
use App\Bdc;
use App\Depot;
use App\Role;
use App\Constant;
use App\Lc;

class AdminController extends Controller
{

    private $modelList = "";

    public function __construct() {

        $this->modelList = [
            
            'users/users' => 'User::getUsers',
            'products/products' => 'Product::getProducts',
            'reports/reports' => 'Report::getReports',
            'banks/banks' => 'Bank::getBanks',
            'bdc/bdc' => 'Bdc::getBdcs',
            'depots/depots' => 'Depot::getDepots',
            'reports/daily-stock-taking' => 'Report::dailyStockTaking',
            'reports/daily-summary-sheet' => 'Report::all',
            'reports/cumulative-stock' => 'Report::all',
            'constants/constants' => 'Constant::all',
            'lcs/lcs' => 'Lc::getLcs',
            'reports/bdc-daily-stock' => 'Bdc::getReports',
        ];       
    }

    public function asyncView($main, $sub, Request $request)
    {
    	$route = $main.'/'.$sub;
        
        $viewTitle = ucfirst($main).' / '.ucfirst($sub);
        $method = "App\\".$this->modelList[$route];
        list($model, $caller) = explode('::', $method);

         $models = ("$model::$caller" != null)? $model::$caller() : null;
         $roles = Role::all();
         $banks = Bank::all();
         $depots = Depot::all();
         $bdcs = Bdc::all();
         $product = Product::all();
         $consts = Constant::all();
         $roleName = 'field rep';
         $reps = User::whereHas('roles', function($query) use ($roleName) {
                        $query->where('slug', '=', $roleName);
                })->get(); 

        if ($request->ajax()) {

            return view("admin.{$main}.{$sub}", [
                'viewTitle' => $viewTitle, 
                'models' => $models, 
                'roles' => $roles,
                'banks' => $banks,
                'depots' => $depots,
                'bdcs' => $bdcs,
                'products' => $product,
                'consts' => $consts,
                'reps' => $reps,
            ])->render();
        }
        return view("admin.{$main}.{$sub}", compact('viewTitle', 'models'));
        
    }

    public function dashboard()
    {
        $products = count(Product::all());
        $banks = count(Bank::all());
        $bdcs = count(Bdc::all());
        $lcs = count(Lc::all());
        $depots = count(Depot::all());
        $reports = count(Report::all());
        $roleName = 'field rep';

        $reps = User::whereHas('roles', function($query) use ($roleName) {
                        $query->where('slug', '=', $roleName);
                })->where('status', 1)->get();  
        $reps = count($reps);

        return view('pages.admin-dashboard', compact(
            'products',
            'banks',
            'bdcs',
            'lcs',
            'reps',
            'depots',
            'reports'
        ));
    }

}
