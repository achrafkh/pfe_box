<?php

namespace App\Http\Controllers\Callcenter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lead;
use Session;

class DashboardController extends Controller
{
    public function index()
    {
        return view('op.index')->with('leads', Lead::with('client')->paginate(6));
    }

    public function show(Lead $lead)
    {
        // dd($lead->load('client')->toarray());
        return view('op.client')->with('lead', $lead->load('client'));
    }

    public function delete(Lead $lead)
    {
        if (!$lead->delete()) {
            Session::flash('error', 'Something went Wrong');
        }
        Session::flash('success', 'Something went Wrong');
        return redirect()->route('op');
    }
}
