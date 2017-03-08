<?php

namespace App\Http\Controllers\Callcenter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Appointment;
use Session;

class AppointmentsController extends Controller
{
    public function setappointment(Request $request)
    {
        $app = new Appointment;

        $app->title = $request->title;
        $app->status = 'pending';
        $app->notes = $request->note;
        $app->showroom_id = $request->showroom_id;
        $app->client_id = $request->client_id;
        $app->start_at = $request->day . ' ' . $request->start_time;
        $app->end_at = $request->day . ' ' . $request->end_time;

        if (!$app->save()) {
            Session::flash('error', 'Something went Wrong');
            return redirect()->back();
        }

        Session::flash('success', 'Added successfully');
        return redirect()->back();
    }
}
