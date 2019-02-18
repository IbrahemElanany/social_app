<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
 	public function login(Request $request)
 	{
 		return view('admin.auth.login');
 	}   
 	public function doLogin(Request $request)
 	{
 		$rememberme = $request->rememberme == 1 ? true: false;
 		if(auth()->guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$rememberme))
 		{
 			return redirect('admin/users');
 		}else{
 			return redirect('admin/login');
 		}
 	}

 	
}
