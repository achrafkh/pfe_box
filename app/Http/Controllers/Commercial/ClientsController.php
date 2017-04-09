<?php

namespace App\Http\Controllers\Commercial;

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
        if($apps->count()){
            $stats = $this->charts->SimpleStats($apps);
        }
        
        return view('com.clients', compact('apps', 'stats'));
    }
        public function getClients()
    {
       return Datatables::of(DB::select('select concat(firstname, " ", lastname) as name,id,email,phone,address,city,created_at from clients'))->make(true);
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
