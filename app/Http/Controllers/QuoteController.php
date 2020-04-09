<?php

namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function create(Request $request)
    {
        /** @var Quote $quote */
        $quote = Quote::create([
            'company_id' => $request->company_id,
            'customer_id' => $request->customer_id,
            'qualification' => $request->qualification,
            'edition_date' => $request->edition_date,
            'validity_delay_in_days' => $request->validity_delay_in_days,
            'payment_delay_in_days' => $request->payment_delay_in_days,
            'payment_terms' => $request->payment_terms,
            'payment_method' => $request->payment_method,
            'down_payment_percentage' => $request->down_payment_percentage,
            'notice' => $request->notice,
            'accepting_conditions' => $request->accepting_conditions,
            'sending_date' => $request->sending_date,
            'revived_date' => $request->revived_date,
            'last_qualification_date' => $request->last_qualification_date,
        ]);
        return response()->json(['quote',$quote]);


    }
    public function update(Request $request)
    {
        $quote = Quote::find($request->id);

        $quote->company_id = $request->company_id;
        $quote->customer_id = $request->customer_id;
        $quote->qualification = $request->qualification;
        $quote->edition_date = $request->edition_date;
        $quote->validity_delay_in_days = $request->validity_delay_in_days;
        $quote->payment_delay_in_days = $request->payment_delay_in_days;
        $quote->payment_terms = $request->payment_terms;
        $quote->payment_method = $request->payment_method;
        $quote->down_payment_percentage = $request->down_payment_percentage;
        $quote->notice = $request->notice;
        $quote->accepting_conditions = $request->accepting_conditions;
        $quote->sending_date = $request->sending_date;
        $quote->revived_date = $request->revived_date;
        $quote->last_qualification_date = $request->last_qualification_date;

        $quote->save();

        return response()->json(['quote',$quote]);
    }

    public function delete(Request $request)
    {
        $quote = Quote::find($request->id);
        $quote->delete();
        return response()->json(['status','Deletion ok'],200);
    }

    public function getQuote(Request $request)
    {
        $quotes = Quote::where([
            ['company_id','=',$request->user()->company],
            ['customer_id','=',$request->customer_id]
        ])->get();

        return response()->json(['quote',$quotes]);

    }
}
