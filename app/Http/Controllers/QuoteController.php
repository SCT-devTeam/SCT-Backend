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
    }
}
