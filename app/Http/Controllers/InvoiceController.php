<?php

namespace App\Http\Controllers;

use App\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function create(Request $request)
    {
        /** @var Invoice $invoice */
        $invoice = Invoice::create([
            'company_id' => $request->company_id,
            'customer_id' => $request->customer_id,
            'qualification' => $request->qualification,
            'edition_date' => $request->edition_date,
            'payment_date' => $request->payment_date,
            'payment_delay_in_days' => $request->payment_delay_in_days,
            'payment_terms' => $request->payment_terms,
            'notice' => $request->notice,
            'payment_method' => $request->payment_method,
            'sending_date' => $request->sending_date,
            'revived_date' => $request->revived_date,
            'last_qualification_date' => $request->last_qualification_date,
            'chasing_date' => $request->chasing_date,
            'note' => $request->note,
            'original_quote' => $request->original_quote,
        ]);
    }
}
