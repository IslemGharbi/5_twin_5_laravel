<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function contact(){
        return view('contact');
    }

    public function sendEmail(Request $request){
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message
        ];

        Mail::to('hiba.felfel@esprit.tn')->send(new ContactMail($details));
        return back()->with('message_sent','Your Message Has Been Sent');
    }
}
