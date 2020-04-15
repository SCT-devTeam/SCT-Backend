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
            'legal_form' => 'required',
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
        if ($comp) return response()->json(['company' => $comp], 200);

        return response()->json(['test' => 'non']);

    }

    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'legal_form' => 'present',
            'siret'=>'present',
            'phone'=>'present',
            'street_number'=>'present',
            'street_name'=>'present',
            'zipcode'=>'present',
            'city'=>'present',
            'capital_in_cents'=>'present',
            'insurance'=>'present',
            'bban'=>'present',
            'bban_anytmie'=>'present',
            'default_revive_delay_in_days'=>'present',
            'default_payment_delay_in_days'=>'present',
            'default_payment_terms'=>'present',
            'default_payment_method'=>'required',
            'default_down_payment_percentage'=>'present',
            'default_quote_validity_delay_in_days'=>'present',
            'default_quote_accepting_conditions'=>'present',
            'default_invoice_notice'=>'present',
            'default_quote_notice'=>'present',
            'notes'=>'present',
        ]);

        $company = Company::find($request->user()->companies);

        $company->legal_form = $request->legal_form;
        $company->name = $request->name;
        $company->siret = $request->siret;
        $company->email = $request->email;
        $company->phone = $request->phone;
        $company->street_number = $request->street_number;
        $company->street_name = $request->street_name;
        $company->zipcode = $request->zipcode;
        $company->city = $request->city;
        $company->capital_in_cents = $request->capital_in_cents;
        $company->insurance = $request->insurance;
        $company->bban = $request->bban;
        $company->bban_anytmie = $request->bban_anytmie;
        $company->default_revive_delay_in_days = $request->default_revive_delay_in_days;
        $company->default_payment_delay_in_days = $request->default_payment_delay_in_days;
        $company->default_payment_terms = $request->default_payment_terms;
        $company->default_payment_method = $request->default_payment_method;
        $company->default_down_payment_percentage = $request->default_down_payment_percentage;
        $company->default_quote_validity_delay_in_days = $request->default_quote_validity_delay_in_days;
        $company->default_quote_accepting_conditions = $request->default_quote_accepting_conditions;
        $company->default_invoice_notice = $request->default_invoice_notice;
        $company->default_quote_notice = $request->default_quote_notice;
        $company->notes = $request->notes;

        $company->save();
        return response()->json(['company' => $company], 200);

    }

    public function selectCompany(Request $request)
    {
        $idcompany = $request->user()->companies;
        $company = Company::where('id', '=', $idcompany)->get();
        return response()->json(['comp' => $company]);
    }
}
