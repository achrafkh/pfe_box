<?php

namespace App\Http\Controllers\Callcenter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Appointment;
use Session;
use Illuminate\Support\Collection;

class AppointmentsController extends Controller
{
    public function setAppointment(Request $request)
    {
        $appointment = new Appointment;

        $appointment->title = $request->title;
        $appointment->status = 'pending';
        $appointment->notes = $request->note;
        $appointment->showroom_id = $request->showroom_id;
        $appointment->client_id = $request->client_id;
        $appointment->start_at = $request->day . ' ' . $request->start_time;
        $appointment->end_at = $request->day . ' ' . $request->end_time;
        $status = $appointment->save();

        if ($status && $request->ajax()) {
            $data["status"] = true;
            $data["event"]  = $appointment->toarray();
            return response()->json($data);
        }

        if (!$status) {
            Session::flash('error', 'Something went Wrong');
            return redirect()->back();
        }

        Session::flash('success', 'Added successfully');
        return redirect()->back();
    }

    public function updateAppointment(Request $request)
    {
        $appointment = Appointment::find($request->id);
        $appointment->title = $request->title;
        $appointment->notes = $request->notes;
        $appointment->client_id = $request->client_id;
        $appointment->showroom_id = $request->showroom_id;
        $appointment->client_id = $request->client_id;
        $appointment->start_at = $request->day . ' ' . $request->start_time;
        $appointment->end_at = $request->day . ' ' . $request->end_time;
        $status = $appointment->update();

        if ($status && $request->ajax()) {
            $data["status"] = true;
            $data["event"]  = $appointment->toarray();
            return response()->json($data);
        }

        if (!$status) {
            Session::flash('error', 'Something went Wrong');
            return redirect()->back();
        }

        Session::flash('success', 'Added successfully');
        return redirect()->back();
    }
}
