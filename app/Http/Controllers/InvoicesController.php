<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Invoice;
use Illuminate\Http\Request;
use Session;
use App\Appointment;
use App\Showroom;
use App\InvoiceLine;
use Illuminate\Support\Collection;

class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $users = Invoice::with('appointment.client', 'showroom')->where('status', 'LIKE', "%$keyword%")
                ->orWhere('total', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $invoices = Invoice::with('appointment.client', 'showroom')->paginate($perPage);
        }

        return view('invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Showroom $showroom, Appointment $appointment)
    {
        $appointment->load('client');
        return view('invoices.create', compact('showroom', 'appointment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $app = Appointment::with('client')->find($request->appointment_id);
        
        $inputs = $request->all();
        $items = new Collection();
        $total = 0;
        $i = count($request->quantity);
        for ($x = 0; $x < $i; $x++) {
            $invoiceline = new InvoiceLine;
            $invoiceline->description = $inputs['desc'][$x];
            $invoiceline->quantity = $inputs['quantity'][$x];
            $invoiceline->price = $inputs['price'][$x];
            $items->push($invoiceline);
            
            $total += ($invoiceline->quantity * $invoiceline->price);
        }

       

        $invoice                    = new Invoice;
        $invoice->status            = $request->status;
        $invoice->appointment_id    = $request->appointment_id;
        $invoice->showroom_id       = $app->showroom_id;
        $invoice->total             = $total;
        //dd($invoice);
        $invoice->save();
        $invoice->items()->saveMany($items);



       //
        Session::flash('flash_message', 'Invoice added!');

        return redirect('invoice/'.$request->showroom_id.'/'.$request->appointment_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $invoice = Invoice::with('items')->findOrFail($id);

        return view('invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $invoice = Invoice::with('items')->findOrFail($id);

        //dd($invoice->toarray());

        return view('invoices.edit', compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $inputs = $request->all();
        $items = new Collection();
        $total = 0;
        $i = count($request->quantity);
        for ($x = 0; $x < $i; $x++) {
            $invoiceline = new InvoiceLine;
            $invoiceline->description = $inputs['desc'][$x];
            $invoiceline->quantity = $inputs['quantity'][$x];
            $invoiceline->price = $inputs['price'][$x];
            $items->push($invoiceline);
            
            $total += ($invoiceline->quantity * $invoiceline->price);
        }
        

        $invoice = Invoice::findOrFail($id);
        $data = $request->only('appointment_id', 'showroom_id', 'status');
        $data['total'] = $total;

        $invoice->update($data);
        $invoice->items()->delete();
        $invoice->items()->saveMany($items);


        return redirect('invoices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Invoice::destroy($id);

        Session::flash('flash_message', 'Invoice deleted!');

        return redirect('invoices');
    }


    public function showInvoice(Showroom $showroom, Appointment $appointment)
    {
        $appointment->load('invoice.items', 'client');

        return view('invoices.invoice', compact('appointment', 'showroom'));
    }
}
