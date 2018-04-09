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

class AdminController extends Controller
{

    private $modelList = "";

    public function __construct() {

        $this->modelList = [
            
            'users/users' => 'User::getUsers',
            'products/products' => 'Product::getProducts',
            'reports/reports' => 'Report::all',
            'banks/banks' => 'Bank::all',
            'bdc/bdc' => 'BDC::all',
            'depots/depots' => 'Depot::all',
            'reports/daily-stock-taking' => 'Report::all',
            'reports/daily-summary-sheet' => 'Report::all',
            'reports/cumulative-stock' => 'Report::all',
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

        if ($request->ajax()) {
            return view("admin.{$main}.{$sub}", [
                'viewTitle' => $viewTitle, 
                'models' => $models, 
                'roles' => $roles,
                'banks' => $banks,
                'depots' => $depots,
                'bdcs' => $bdcs
            ])->render();
        }
        return view("admin.{$main}.{$sub}", compact('viewTitle', 'models'));
        
    }

    public function dashboard()
    {
        return view('pages.admin-dashboard');
    }

}
