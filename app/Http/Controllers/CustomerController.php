<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function create(Request $request)
    {
        /** @var Customer $customer */
        $customer = Customer::create([
            'customer_type'=>$request->customer_type ,
            'status'=>$request->status ,
            'meeting_date'=>$request->meeting_date ,
            'company_name'=>$request->company_name ,
            'siret'=>$request->siret ,
            'tva_number'=>$request->tva_number ,
            'firstname'=>$request->firstname ,
            'lastname'=>$request->lastname ,
            'street_number'=>$request->street_number ,
            'street_name'=>$request->street_name ,
            'zipcode'=>$request->zipcode ,
            'city'=>$request->city ,
            'note'=>$request->note ,
            'default_payment_method'=>$request->default_payment_method ,
        ]);
    }
}