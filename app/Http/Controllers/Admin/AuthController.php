<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use PHPMailer;
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

        //sendEmail('info@strikerlands.com', 'Testing email', 'tisuchi@gmail.com');
        $mail = new \PHPMailer(true);
             try{
                $mail->isSMTP();
                $mail->CharSet = ''; #set it utf->8
                $mail->SMTPAuth = true ; #set it true
                $mail->SMTPSecure = 'ssl';
                $mail->Host = 'host.stricklands.com'; #gmail has host  smtp.gmail.com
                $mail->Port = 465; #gmail has port  587 . without double quotes
                $mail->Username = 'freelancer@519stricklands.com'; #your username. actually your email
                $mail->Password = '~X@xU9PMaG;k'; # your password. your mail password
                $mail->setFrom('hello@stricklands.com', 'Hello'); 
                $mail->Subject = "Testing Email";
                $mail->MsgHTML('This is for testing. How is going?');
                $mail->addAddress(['tisuchi@gmail.com'] ,['Thouhedul Islam']); 
                $mail->send();
             }catch(phpmailerException $e){
                dd($e);
             }catch(Exception $e){
                dd($e);
             } 




        return "";
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
