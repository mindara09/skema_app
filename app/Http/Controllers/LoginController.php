<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class LoginController extends Controller
{
    
    public function login()
    {
    	return view('login');
    }

    public function proses_login(Request $request)
    {
    	if (Auth::attempt($request->only('username', 'password'))) {
    		return redirect('/dashboard');
    	}
    	return redirect('/_adminlogin')->with('gagal','Login Failure! Check Username & Password');
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/_adminlogin');
    }
}
