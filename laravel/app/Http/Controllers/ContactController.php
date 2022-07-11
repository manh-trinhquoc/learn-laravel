<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest as Request;
use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function create()
    {
        $data = [
            'title_1' => 'Contact HackerPair',
            'title_2' => 'Your message will be delivered to our clandestine team',
        ];

        return view('contact.create', $data);
    }

    public function store(Request $request)
    {
        $contact = [];

        $contact['name'] = $request->get('name');
        $contact['email'] = $request->get('email');
        $contact['msg'] = $request->get('msg');

        // var_dump(config('mailgun.domain'));
        // die(__FILE__);

        Mail::to(config('mail.mail-to'))->send(new ContactEmail($contact));

        flash('Your message has been sent!')->success();

        return redirect()->route('contact.create');
    }
}
