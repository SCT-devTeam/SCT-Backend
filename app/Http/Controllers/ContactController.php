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
            'gender'=>$request->gender ,
            'firstname'=>$request->firstname ,
            'lastname'=>$request->lastname ,
            'job'=>$request->job ,
            'email'=>$request->email ,
            'phone_mobile'=>$request->phone_mobile ,
            'phone_fix'=>$request->phone_fix ,
            'phone_personnal'=>$request->phone_personnal ,
            'phone_fax'=>$request->phone_fax ,
            'notes'=>$request->notes ,
            'customer'=>$request->id_customer,
        ]);
        return response()->json(['Contact', $contact],200);
    }

    public function getContact(Request $request)
    {
        $contacts = Contact::where('customer','=',$request->id_customer)->get();
        return response()->json(['contacts',$contacts]);
    }

    public function updateContact(Request $request)
    {
        $contact = Contact::find($request->id_contact);

        $contact->gender=$request->gender;
        $contact->firstname=$request->firstname;
        $contact->lastname=$request->lastname;
        $contact->job=$request->job;
        $contact->email=$request->email;
        $contact->phone_mobile=$request->phone_mobile;
        $contact->phone_fix=$request->phone_fix;
        $contact->phone_personnal=$request->phone_personnal;
        $contact->phone_fax=$request->phone_fax;
        $contact->notes=$request->notes;

        $contact->save();

        return response()->json(['contact',$contact]);
    }

    public function deleteContact(Request $request)
    {
        $contact = Contact::find($request->id_contact);
        $contact->delete();

        return response()->json(['status','Deletion ok'],200);
    }
}
