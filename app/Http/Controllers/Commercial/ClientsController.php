<?php

namespace App\Http\Controllers\Commercial;

use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Repo\Calendar\ICalendarRepository;
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
    
    public function __construct(ICalendarRepository $calendar)
    {
        $this->data = $calendar;
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

        return view('com.clients', compact('clients', 'cities', 'apps', 'stats'));
    }

    public function show(Client $client)
    {
        $calendar = $this->data->getClientCalender($client->id);
        $cities = Countries::where('name.common', 'Tunisia')->first()->states->pluck('name', 'postal');
       
        $data =  Appointment::where('client_id', $client->id)->get();

        $donut[] = ["label" => "done","value" => $data->where("status", "done")->count()];
        $donut[] = ["label" => "rescheduled","value" => $data->where("status", "rescheduled")->count()];
        $donut[] = ["label" => "pending","value" => $data->where("status", "pending")->count()];

        $showrooms = Showroom::get();
        $client->load('invoices.showroom');
        
        return view('com.showclient', compact('showrooms', 'client', 'calendar', 'donut', 'cities'));
    }
}
