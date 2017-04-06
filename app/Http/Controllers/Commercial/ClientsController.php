<?php

namespace App\Http\Controllers\Commercial;

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
        $clients = Client::get();

        $stats['week-total'] = $apps->count();
        $stats['week-success'] = $apps->where('status', 'done')->count();
        $stats['week-rescheduled'] = $apps->where('status', 'rescheduled')->count();
        $stats['success'] =  ($stats['week-success'] / $stats['week-total']) * 100;

        return view('com.clients', compact('clients', 'apps', 'stats'));
    }

    public function show(Client $client)
    {
        $calendar = $this->data->getClientCalender($client->id);
       
        $data =  Appointment::where('client_id', $client->id)->get();

        $donut = $this->charts->AppointmentsDonutChart($data);
        
        $showrooms = Showroom::get();
        $client->load('invoices.showroom', 'invoices.appointment');
        
        return view('com.showclient', compact('showrooms', 'client', 'calendar', 'donut'));
    }
}
