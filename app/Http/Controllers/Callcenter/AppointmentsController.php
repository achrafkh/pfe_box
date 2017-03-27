<?php

namespace App\Http\Controllers\Callcenter;

use Illuminate\Http\Request;
use App\Http\Requests\CreateAppointmentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Appointment;
use Session;
use Illuminate\Support\Collection;
use App\User;
use App\Mail\newAppointment;
use App\Mail\newAppointmentClient;
use App\Client;

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

        if (!$status) {
            $data["status"] = false;
            $data["event"]  = []; 
            return response()->json($data);
        }

        $data["status"] = true;
        $data["event"]  = $appointment->toarray(); 

        $client = Client::find($appointment->client_id);
        $users = User::where('showroom_id',$appointment->showroom_id)->get();

        //mail to agents
        Mail::to($users)->queue(new newAppointment($client,$appointment));
        //mail to Client
        Mail::to($client)->queue(new newAppointmentClient($appointment));

        return response()->json($data);
    }

    public function updateAppointment(Request $request)
    {
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
        
         if (!$status) {
            $data["status"] = false;
            $data["event"]  = []; 
            return response()->json($data);
        }

        $data["status"] = true;
        $data["event"]  = $appointment->toarray(); 

        return response()->json($data);

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
