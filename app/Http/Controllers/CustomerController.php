<?php

namespace App\Http\Controllers;

use App\Company;
use App\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'customer_type' => 'present',
            'status' => 'present',
            'meeting_date' => 'present',
            'company_name' => 'present',
            'siret' => 'present',
            'tva_number' => 'present',
            'firstname' => 'present',
            'lastname' => 'present',
            'street_number' => 'present',
            'street_name' => 'present',
            'zipcode' => 'present',
            'city' => 'present',
            'note' => 'present',
            'default_payment_method' => 'present',
            'company' => 'present',
        ]);
        $companie = Company::find($request->user()->companies);

        /** @var Customer $customer */
        $customer = Customer::create([
            'customer_type' => $request->customer_type,
            'status' => $request->status,
            'meeting_date' => $request->meeting_date,
            'company_name' => $request->company_name,
            'siret' => $request->siret,
            'tva_number' => $request->tva_number,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'street_number' => $request->street_number,
            'street_name' => $request->street_name,
            'zipcode' => $request->zipcode,
            'city' => $request->city,
            'note' => $request->note,
            'default_payment_method' => $request->default_payment_method,
            'company' => $companie->id
        ]);
        return response()->json($customer);
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'customer_type'=>'present',
                'status'=>'present',
                'meeting_date'=>'present',
                'company_name'=>'present',
                'siret'=>'present',
                'tva_number'=>'present',
                'firstname'=>'present',
                'lastname'=>'present',
                'street_number'=>'present',
                'street_name'=>'present',
                'zipcode'=>'present',
                'city'=>'present',
                'note'=>'present',
                'default_payment_method'=>'present',
                'company'=>'required',
            ]
        );

        $customer = Customer::find($request->id);

        $customer->customer_type = $request->customer_type;
        $customer->status = $request->status;
        $customer->meeting_date = $request->meeting_date;
        $customer->company_name = $request->company_name;
        $customer->siret = $request->siret;
        $customer->tva_number = $request->tva_number;
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->street_number = $request->street_number;
        $customer->street_name = $request->street_name;
        $customer->zipcode = $request->zipcode;
        $customer->city = $request->city;
        $customer->note = $request->note;
        $customer->default_payment_method = $request->default_payment_method;

        $customer->save();

        return response()->json($customer);
    }

    public function getCustomerAll(Request $request)
    {
        $request->validate([
           'id_company'=>'required'
        ]);

        $customers = Customer::where('company', '=', $request->id_company)->get();
        return response()->json($customers);
    }

    public function delete(Request $request)
    {
        $request->validate(['id'=>'required']);
        $customer = Customer::find($request->id);
        $customer->delete();
        return response()->json(['status', 'Deletion ok'], 200);
    }
}
