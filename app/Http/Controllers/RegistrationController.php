<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    //

    public function getRegister()
    {
    	return view('pages.register');
    }

    public function postRegister(Request $request)
    {
    	$this->validate($request, [
    		'username' => 'required|string',
    		'email' => 'required|string|email|max:255|unique:users',
    		'password' => 'required|string|min:6',
    		'phone' => 'required',
    	]);

    	if ($request->password != $request->password_confirmation) {
    		# code...
    		$request->session()->flash('mismatch', 'Your password and confirm password do not match');
    		return redirect()->back();
    	}
    	else{

    		User::create([
    			'username' => $request->username,
    			'email' => $request->email,
    			'password' => bcrypt($request->password),
    			'phone' => $request->phone,
    		]);

    	}
    }
}
