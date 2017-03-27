<?php

namespace App\Http\Controllers\Commercial;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\Calendar\ICalendarRepository;
use App\Appointment;
use App\Showroom;

class AppointmentsController extends Controller
{
    protected $data;
    public function __construct(ICalendarRepository $calendar)
    {
        $this->data = $calendar;
    }
    public function index(Request $request)
    {
        $calendar = $this->data->getAll();
        $showrooms = Showroom::get();

        return view('com.index', compact('calendar', 'showrooms'));
    }

    public function updateStatus(Request $request)
    {
        $this->validate($request, [
            'id' => 'exists:appointments,id',
            'status' => 'required|in:done,rescheduled,pending',
        ]);

        $app = Appointment::where('id', $request->id)->get([
            'showroom_id','client_id','id','title', 'start_at', 'end_at','status','notes'
        ])->first();

        $app->status = $request->status;


        if (!$app->save()) {
            return response()->json(false);
        }

        $app->load('client');

        $data['status'] = true;
        $data['event'] = $app->toarray();
        $data['event']['color'] = ($app->status == 'done') ? '#10c390' : '#1751c3';
        return response()->json($data);
    }


    public function getEvents(Request $request)
    {
        if ($request->showroom_id != 'all') {
            return response()->json($this->data->getShowRoomCalender($request->showroom_id));
        }
        
        return response()->json($this->data->getAll());
    }
}
