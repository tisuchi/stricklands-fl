<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    

    public function showLogin()
    {
    	return view('admin.pages.login');
    }



    public function doLogin()
    {
    	

    	if ( Auth::attempt(['email' => request()->input('email'), 'password' => request()->input('password')])) {
            //fail authentication
            return redirect()->back()->with('danger', "Wrong Username / Password");
        }


        return redirect()->route('admin-search')->with('success', 'You have successfully logged in.');
    }




    public function doLogout()
    {
    	Auth::logout();
    	return redirect()->route('login')->with('success', 'You have successfully logged Out.');	
    }




}
