<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create(Request $request)
    {
        /** @var Contact $contact */
        $contact = Contact::create([
            'gender' => $request->gender,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'job' => $request->job,
            'email' => $request->email,
            'phone_mobile' => $request->phone_mobile,
            'phone_fix' => $request->phone_fix,
            'phone_personnal' => $request->phone_personnal,
            'phone_fax' => $request->phone_fax,
            'notes' => $request->notes,
        ]);
    }
}
