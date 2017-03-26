<?php

namespace App\Http\Controllers\Callcenter;

use Illuminate\Http\Request;
use App\Http\Requests\CreateAppointmentRequest;
use App\Http\Controllers\Controller;
use App\Appointment;
use Session;
use Illuminate\Support\Collection;
use App\User;

class AppointmentsController extends Controller
{
    public function setAppointment(CreateAppointmentRequest $request)
    {


        $appointment = new Appointment;

        $appointment->title = $request->title;
        $appointment->status = 'pending';
        $appointment->notes = $request->notes;
        $appointment->showroom_id = $request->showroom_id;
        $appointment->client_id = $request->client_id;
        $appointment->start_at = $request->day . ' ' . $request->start_at;
        $appointment->end_at = $request->day . ' ' . $request->end_at;
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
        return response()->json($request->all());
        $appointment = Appointment::find($request->id);
        $appointment->title = $request->title;
        $appointment->notes = $request->notes;
        $appointment->client_id = $request->client_id;
        $appointment->showroom_id = $request->showroom_id;
        if ($request->has('day')) {
            $appointment->start_at = $request->day . ' ' . $request->start_time;
            $appointment->end_at = $request->day . ' ' . $request->end_time;
        } else {
            $appointment->start_at = $request->start;
            $appointment->end_at = $request->end;
        }
        
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

    public function checkAvailable(Request $request)
    {
        $commercials = User::where('showroom_id', $request->showroom_id)->whereHas('role', function ($query) {
            $query->where('title', 'like', 'com');
        })->get();

        $response['status'] = "success";
        $response['coms'] = $commercials->toarray();
        return response()->json($response);
    }

    public function updateTime(Request $request)
    {
        $app = Appointment::find($request->id)->update([
            'start_at' => $request->start,
            'end_at'   => $request->end,
            ]);


        if (!$app) {
            return response()->json(false);
        }
        return response()->json(true);
    }
}
