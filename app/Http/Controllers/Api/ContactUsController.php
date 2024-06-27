<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\SentContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
//use Mail;
class ContactUsController extends Controller
{
    public function contact(){
        return view('emails.contact-us');
    }

    public function sendEmail(Request $request){
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'msg' => $request->msg
        ];
        Mail::to('lukakirincic2003@gmail.com')->send(new SentContactUsMail($details));
        return back()->with('message_sent','Your message has been sent successfully!');
    }
}