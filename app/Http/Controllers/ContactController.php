<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact()
    {
        return view('pages.contact-us');
    }

    public function sendEmail(Request $req)
    {

        $details = [
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'msg' => $req->msg,
        ];

        $email = new ContactMail($details);

        Mail::to('zamiaswad@gmail.com')->send($email);

        return back()->with('message-sent', 'Your message has been successfully');
    }
}
