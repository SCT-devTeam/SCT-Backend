<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;


class CompanyController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
        'email' => 'required|email',
        'name' => 'required',
        'legal_form'=>'required',
    ]);
        /** @var Company $comp */

            $comp = Company::create([
                'legal_form' => $request->legal_form,
                'name' => $request->name,
                'siret' => $request->siret,
                'email' => $request->email,
                'phone' => $request->phone,
                'street_number' => $request->street_number,
                'street_name' => $request->street_name,
                'zipcode' => $request->zipcode,
                'city' => $request->city,
                'capital_in_cents' => $request->capital_in_cents,
                'insurance' => $request->insurance,
                'bban' => $request->bban,
                'bban_anytmie' => $request->bban_anytmie,
                'default_revive_delay_in_days' => $request->default_revive_delay_in_days,
                'default_payment_delay_in_days' => $request->default_payment_delay_in_days,
                'default_payment_terms' => $request->default_payment_terms,
                'default_payment_method' => $request->default_payment_method,
                'default_down_payment_percentage' => $request->default_down_payment_percentage,
                'default_quote_validity_delay_in_days' => $request->default_quote_validity_delay_in_days,
                'default_quote_accepting_conditions' => $request->default_quote_accepting_conditions,
                'default_invoice_notice' => $request->default_invoice_notice,
                'default_quote_notice' => $request->default_quote_notice,
                'notes' => $request->notes
            ]);
        if ($comp) return response()->json(['name'=>$request->name],200);

        return response()->json(['test'=>'non']);

    }

    public function selectCompany(Request $request)
    {
        $idcompany = $request->user()->companies;
        $company = Company::where('id','=',$idcompany)->get();
        return response()->json(['comp'=>$company]);
    }
}
