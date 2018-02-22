<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
require_once(app_path().'/Libraries/PHPMailer-5.2-stable/PHPMailerAutoload.php');
use phpmailer;

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
            $emailContent = "Hello";
            $emailContent .= "Please click on following link and set your password.";
            $emailContent .= route('confirm-password-Reset', $hasHash->passowrd_recovery_hash);

            //send email
            sendEmail('freelancer@519stricklands.com', 'Reset Password', $emailContent, $email);

            return redirect()
                    ->back()->with('success', 'You have successfully requested for password reset.');

        } else {

            $addHash = User::where('fld_usr_email', $email)->first();

            //if no user, return error 
            if (!$addHash) return redirect()->back()->with('danger', 'Opps. There is no user with this email.');


            $addHash->passowrd_recovery_hash = str_random(40);
            $addHash->save();

            //trigger an email for with password reset details
            $emailContent = "Hello";
            $emailContent .= "Please click on following link and set your password.";
            $emailContent .= route('confirm-password-Reset', $addHash->passowrd_recovery_hash);

            //send email
            sendEmail('freelancer@519stricklands.com', 'Reset Password', $emailContent, 'tisuchi@gmail.com');

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
            return view('admin.pages.reset-password-form');
        } 

        return redirect()
                ->route('login')->with('error', "Something went wrong. The password reset code already expired.");
    }





    public function doResetPassword()
    {
        
        $hash = request()->input('hash');
        $hasHash = User::where('passowrd_recovery_hash', $hash)->first();
        
        if (!$hasHash) return redirect()->route('login')->with('danger', 'Opps!. Something went wrong');
        if (request()->input('password') !== request()->input('password_confirmation')) return redirect()->back()->with('danger', 'Opps!. Passwords didn\'t Match');

        $hasHash->fld_usr_password = bcrypt(request()->input('password'));
        $hasHash->passowrd_recovery_hash = '';
        $hasHash->save();


        //trigger an email for with password reset details
        $emailContent = "Hello";
        $emailContent .= "You have changed your password successfully";

        //send email
        sendEmail('freelancer@519stricklands.com', 'Password Reset Successfully.', $emailContent, $hasHash->fld_usr_email);


        return redirect()
                ->route('login')
                ->with('success', 'You have successfully changed your email.');

    }




}
