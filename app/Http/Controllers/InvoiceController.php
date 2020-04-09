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

        return response()->json(['invoice',$invoice], 200);

    }
        public function update(Request $request)
    {
        $invoice = Invoice::find($request->id);

        $invoice->company_id= $request->company_id;
        $invoice->customer_id= $request->customer_id;
        $invoice->qualification= $request->qualification;
        $invoice->edition_date= $request->edition_date;
        $invoice->payment_date = $request->payment_date;
        $invoice->payment_delay_in_days= $request->payment_delay_in_days;
        $invoice->payment_terms=$request->payment_terms;
        $invoice->notice= $request->notice;
        $invoice->payment_method= $request->payment_method;
        $invoice->sending_date= $request->sending_date;
        $invoice->revived_date= $request->revived_date;
        $invoice->last_qualification_date= $request->last_qualification_date;
        $invoice->chasing_date-> $request=chasing_date;
        $invoice->note= $request->note;
        $invoice->original_quote= $request->original_quote;

        $invoice->save();

        return response()->json(['invoice',$invoice], 200);
    }

    public function delete(Request $request)
    {
        $request->validate(['id'=>'required']);

        $invoice = Invoice::find($request->id);
        $invoice->delete();

        return response()->json(['status','Deletion ok'],200);
    }

    public function getInvoice(Request $request)
    {
        $invoices = Invoice::where([
            ['company_id','=',$request->user()->company],
            ['customer_id','=',$request->customer_id]
        ])->get();

        return response()->json(['invoices'=>$invoices]);
    }

}
