<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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






    public function showForgetPassword()
    {
        return view('admin.pages.forget');
    }



    public function doForgetPassword()
    {
        $email = request()->input('email');
        $hasHash = User::where('fld_usr_email', $email)->where('passowrd_recovery_hash', '!=', '<>')->first();

        if ($hasHash) {
            //trigger an email for with password reset details
            return redirect()
                    ->back()->with('success', 'You have successfully requested for password reset.');

        } else {
            $addHash = User::where('fld_usr_email', $email)->first();
            $addHash->passowrd_recovery_hash = Hash::make(Carbon::now());
            $addHash->save();
            return redirect()
                    ->back()->with('success', 'You have successfully requested for password reset.');
        }

    }





    public function confirmPasswordReset($hash)
    {
        if ( empty($hash)) { return false; }

        $hasHash = User::where('passowrd_recovery_hash', $hash)->first();

        if ($hasHash) {
            //show password reset form 
            return "fine";
        } 

        return redirect()
                ->route('login')->with('error', "Something went wrong. The password reset code already expired.");
    }




}
