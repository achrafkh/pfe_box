<?php

namespace App\Http\Controllers\Callcenter;

use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Repo\Calendar\ICalendarRepository;
use App\Repo\Charts\IChartsRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Appointment;
use Carbon\Carbon;
use App\Showroom;
use App\Client;
use Countries;
use App\User;
use Session;

class ClientsController extends Controller
{
    protected $data;
    
    protected $charts;

    public function __construct(ICalendarRepository $calendar, IChartsRepository $charts)
    {
        $this->data = $calendar;
        $this->charts = $charts;
    }
    public function index()
    {
        $apps = Appointment::where('start_at', '>=', Carbon::now()->subWeek())->get();
        $cities = Countries::where('name.common', 'Tunisia')->first()->states->pluck('name', 'postal');
        $clients = Client::get();

        $stats['week-total'] = $apps->count();
        $stats['week-success'] = $apps->where('status', 'done')->count();
        $stats['week-rescheduled'] = $apps->where('status', 'rescheduled')->count();
        $stats['success'] =  ($stats['week-success'] / $stats['week-total']) * 100;

        return view('op.index', compact('clients', 'cities', 'apps', 'stats'));
    }

    public function show(Client $client)
    {
        $calendar = $this->data->getClientCalender($client->id);
        $cities = Countries::where('name.common', 'Tunisia')->first()->states->pluck('name', 'postal');
       
        $data =  Appointment::where('client_id', $client->id)->get();

        $donut = $this->charts->AppointmentsDonutChart($data);

        $showrooms = Showroom::get();
        $client->load('invoices.showroom');
        
        return view('op.showclient', compact('showrooms', 'client', 'calendar', 'donut', 'cities'));
    }

    public function create()
    {
        return view('op.createclient');
    }


    public function store(CreateClientRequest $request)
    {
        $response['status'] = false;
        $response['data'] = null;
        if (!$response['data'] = Client::create($request->all())) {
            return response()->json($response);
        }
        $response['status'] = true;
        
        return response()->json($response);
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
