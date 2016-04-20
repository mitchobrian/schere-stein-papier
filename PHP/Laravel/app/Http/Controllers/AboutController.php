<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AboutController extends Controller
{
    public function create()
    {
        return view('contact');
    }

    public function store(ContactFormRequest $request)
    {
		\Mail::send('emails.contact',
        array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'user_message' => $request->get('message')
        ), function($message)
    {
        $message->from('schere.stein.papier.test@gmail.com');
        $message->to('schere.stein.papier.test@gmail.com', 'passwort123')->subject('Schnick Scnhnack Schnuck Feedback');
    });
		return \Redirect::route('contact')->with('message', 'Thanks for contacting us!');
    }
}
