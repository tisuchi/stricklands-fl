<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
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
        
        //check userlogin manually
        $hasUser = User::where('fld_usr_email', request()->input('email'))
                        ->where('fld_usr_password', request()->input('password'))       
                        //->where('fld_usr_status', 'Y')
                        ->first();
        

        if ( $hasUser ) {
            Auth::login($hasUser);
            
            return redirect()->route('index-dashboard')->with('success', 'You have successfully logged in.');            
        }  else {
            return redirect()->back()->with('danger', "Wrong Username / Password");
        } 	
    }




    public function doLogout()
    {
    	Auth::logout();
    	return redirect()->route('login')->with('success', 'You have successfully logged Out.');	
    }




}
