<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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

        //sendEmail('info@strikerlands.com', 'Testing email', 'tisuchi@gmail.com');
        $mail = new PHPMailer;

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'host.stricklands.com';                       // Specify main and backup server
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'freelancer@519stricklands.com';                   // SMTP username
        $mail->Password = '~X@xU9PMaG;k';               // SMTP password
        //$mail->Host = 'smtp.gmail.com';
        //$mail->Username = 'ts92513@gmail.com';
        //$mail->Password = 'happy216';
        $mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
        $mail->Port = 465;                                    //Set the SMTP port number - 587 for authenticated TLS
        $mail->setFrom('info@stricklands.com', 'Enquiry');
        //$mail->SMTPDebug = 2;
        //$mail->setFrom('websites@stricklandsmail.ca', 'Stricklands Leads');     //Set who the message is to be sent from
        //$mail->addReplyTo('websites@stricklandsmail.ca', 'Stricklands Leads');  //Set an alternative reply-to address
        $mail->addAddress('tisuchi@gmail.com', 'Thouhedul Islam');  // Add a recipient :franklennon@live.ca
        //$mail->addAddress('leadbackup@stricklands.com', 'Lead Backup');  // Add a recipient
        //$mail->addAddress('leads@stricklands.motosnap.com');               // Name is optional
        $mail->isHTML(false);
        
        $mail->Subject = "Testing Email";
        $mail->Body  = "I am sorry Sharmin";
        $result = $mail->send();
        if(!$result) {
                //echo 'Message could not be sent.';
            return 'Mailer Error: ' . $mail->ErrorInfo;
        }else{
            return 'success';
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
