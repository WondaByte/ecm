<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BdcController extends Controller
{
    
    public function dashboard()
    {
    	return view('pages.bdc-dashboard');
    }
}
