<?php

namespace App\Http\Controllers\Callcenter;

use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Repo\Calendar\ICalendarRepository;
use Yajra\Datatables\Facades\Datatables;
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
use Cache;
use DB;

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
        $stats = null;
        if ($apps->count()) {
            $stats = $this->charts->SimpleStats($apps);
        }
        
        return view('op.index', compact('clients', 'apps', 'stats'));
    }

    public function getClients()
    {
       return Datatables::of(DB::select('select concat(firstname, " ", lastname) as name,src,id,email,phone,address,city,created_at from clients'))->make(true);
    }

    public function show(Client $client)
    {
        $id = $client->id;
        $minutes = 10;
        $data = Cache::remember('user-apps-'.$id, $minutes, function () use ($id) {
            return Appointment::where('client_id', $id)->get();
        });
        
        $calendar = Cache::remember('calendar-'.$id, $minutes, function () use ($id) {
            return $this->data->getClientCalender($id);
        });

        $donut = Cache::remember('donut-'.$id, $minutes, function () use ($data) {
            return $this->charts->AppointmentsDonutChart($data);
        });

        $showrooms = Cache::remember('showrooms', $minutes, function () use ($data) {
            return Showroom::get();
        });

        $client->load('invoices.showroom', 'invoices.appointment.client');
    
        return view('op.showclient', compact('showrooms', 'client', 'calendar', 'donut'));
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
