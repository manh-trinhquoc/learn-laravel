<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest as Request;
use App\Mail\ContactEmail;

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

        Mail::to(config('mail.support.address'))->send(new ContactEmail($contact));

        flash('Your message has been sent!')->success();

        return redirect()->route('contact.create');
    }
}
