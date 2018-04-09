<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ECMRepController extends Controller
{
    //
   public function dashboard()
    {
    	return view('pages.ecmRep-dashboard');
    }
}
