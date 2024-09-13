<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

class MailController extends Controller
{

    public function emailSend()
    {
        return view('mail.mailData');
    }


    public function sendEmail(Request $request)
    {
       $to = $request->email;
       $subject = $request->subject;
       $msg = $request->message;

       Mail::to($to)->send(new WelcomeEmail($subject, $msg));

       return "mail sent";
    }
}
