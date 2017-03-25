<?php

namespace App\Http\Controllers\Callcenter;

use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\Calendar\ICalendarRepository;
use App\Client;
use App\User;
use App\Showroom;
use App\Appointment;
use Session;
use Carbon\Carbon;

class ClientsController extends Controller
{
    protected $data;
    
    public function __construct(ICalendarRepository $calendar)
    {
        $this->data = $calendar;
    }
    public function index()
    {
        $apps = Appointment::where('start_at', '>=', Carbon::now()->subWeek())->get();

        $stats['week-total'] = $apps->count();
        $stats['week-success'] = $apps->where('status', 'done')->count();
        $stats['week-rescheduled'] = $apps->where('status', 'rescheduled')->count();
        $stats['success'] =  ($stats['week-success'] / $stats['week-total']) * 100;

        return view('op.index')->with('users', Client::get())->with('stats', $stats);
    }

    public function show(Client $client)
    {
        $calendar = $this->data->getClientCalender($client->id);

        $data =  Appointment::where('client_id', $client->id)->get();

        $donut[] = ["label" => "done","value" => $data->where("status", "done")->count()];
        $donut[] = ["label" => "rescheduled","value" => $data->where("status", "rescheduled")->count()];
        $donut[] = ["label" => "pending","value" => $data->where("status", "pending")->count()];

        $showrooms = Showroom::get();

        
        return view('op.showclient', compact('showrooms', 'client', 'calendar', 'donut'));
    }

    public function create()
    {
        return view('op.createclient');
    }


    public function store(CreateClientRequest $request)
    {
        if (!Client::create($request->all())) {
            return response()->json(false);
        }

        return response()->json(true);
    }

    public function edit(Client $client)
    {
        return view('op.editclient', compact('client'));
    }

    public function update(UpdateClientRequest $request)
    {
        $client = Client::where('id', $request->id)->update($request->except('id', '_token'));
        if (!$client) {
            Session::flash('error', 'Something went Wrong');
        }
        Session::flash('success', 'Updated Successfully');
        return redirect()->route('showClient', $request->id);
    }
    
    public function delete(Client $client)
    {
        if (!$client->delete()) {
            Session::flash('error', 'Something went Wrong');
        }
        Session::flash('success', 'Deleted Successfully');
        return redirect()->route('op');
    }
}
