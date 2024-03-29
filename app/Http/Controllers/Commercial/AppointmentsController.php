<?php

namespace App\Http\Controllers\Commercial;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\Calendar\ICalendarRepository;
use App\Mail\newAppointmentUpdatedClient;
use App\Mail\AppointmentDeleted;
use App\Appointment;
use App\Showroom;
use App\User;
use App\Client;
use Mail;

class AppointmentsController extends Controller
{
    protected $data;
    public function __construct(ICalendarRepository $calendar)
    {
        $this->data = $calendar;
    }
    public function index(Request $request)
    {
        $events = $this->data->getAllObj();
        $calendar = $this->data->prepareOutputWithAll($events);
        $showrooms = Showroom::get();

        $data['done'] = $events->where('status', 'done')->count();
        $data['resc'] = $events->where('status', 'rescheduled')->count();
        $data['pending'] = $events->where('status', 'pending')->count();
        $data['agents'] = User::where('showroom_id', '!=', null)->count();
   
 
        return view('com.index', compact('calendar', 'showrooms', 'data'));
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

        if(env('EMAILS'))
        {
            $client = Client::find($app->client_id);
            Mail::to($client)->queue(new newAppointmentUpdatedClient($app));
        }

        $data['status'] = true;
        $data['event'] = $app->toarray();
        $data['event']['color'] = ($app->status == 'done') ? '#99D683' : (($app->status == 'pending') ?'#6164c1': '#FB9678');
        return response()->json($data);
    }


    public function getEvents(Request $request)
    {
        $data['events'] = [];
        if ($request->showroom_id != 'all') {
            $events = $this->data->getShowRoomCalenderObj($request->showroom_id);
            $data['stats']['done'] = $events->where('status', 'done')->count();
            $data['stats']['resc'] = $events->where('status', 'rescheduled')->count();
            $data['stats']['pending'] = $events->where('status', 'pending')->count();
            $data['stats']['agents'] = User::where('showroom_id', $request->showroom_id)->count();
            $data['events'] = $this->data->prepareOutputWithAll($events);

            return response()->json($data);
        }

        $events = $this->data->getAllObj();
        $data['stats']['done'] = $events->where('status', 'done')->count();
        $data['stats']['resc'] = $events->where('status', 'rescheduled')->count();
        $data['stats']['pending'] = $events->where('status', 'pending')->count();
        $data['stats']['agents'] = User::where('showroom_id', $request->showroom_id)->count();
        $data['events'] = $this->data->prepareOutputWithAll($events);

        return response()->json($data);
    }
}
