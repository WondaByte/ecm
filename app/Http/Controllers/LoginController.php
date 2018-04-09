<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class LoginController extends Controller
{
    //
    public function signIn()
    {
    	return view('auth.login');
    }

    public function postSignIn(Request $request)
    {

    	$this->validate($request, [

    		'username' => 'required',
    		'password' => 'required'
    	]);

    	$credentials = ['username' => $request->username, 'password' => $request->password];
        $rememberMe = ($request->remember) ? 1 : 0;

    	if (Auth::attempt($credentials, $rememberMe)) {
    		# code...

    		$user_role = Auth::user()->roles[0]->slug;

    		switch ($user_role) {
    			case 'admin': 
                    $this->updateStatus($request);
    				return redirect('ecm-portal/admin/dashboard');
    				break;

    			case 'field rep':
                    $this->updateStatus($request);
    				return redirect('ecm-portal/field-rep/dashboard');
    				break;
    			case 'bank rep':
                    $this->updateStatus($request);
    				return redirect('ecm-portal/bank/dashboard');
    				break;
				case 'bdc rep':
                    $this->updateStatus($request);
    				return redirect('ecm-portal/bdc-rep/dashboard');
    				break;
    			default:
    			    return redirect()->back();	    				
    		}
    	}
    	else{
    		$request->session()->flash('message', 'Invalid Username or Password');
         	return redirect()->back();
    	}

    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('ecm-portal/auth/');
    }

    public function resetPassword()
    {
        return view('auth.forgot-password');
    }

    public function postResetPassword(Request $request)
    {
        return redirect('/ecm-portal/auth/');
    }

    private function updateStatus($request)
    {
        User::where('username', $request->username)->update(['status' => 1]);
    }
}
