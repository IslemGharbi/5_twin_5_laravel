<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail; 

class MailController extends Controller
{
    public function sendTestEmail()
    {
        Mail::to('saidi.omar@esprit.tn')->send(new TestMail());
    
        return 'Test email sent successfully.';
    }
}
