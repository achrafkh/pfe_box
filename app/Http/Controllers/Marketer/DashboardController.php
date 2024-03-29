<?php

namespace App\Http\Controllers\Marketer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\Charts\IChartsRepository;
use App\Appointment;
use App\Showroom;
use App\Client;
use App\Invoice;
use Carbon\Carbon;
use DB;
use Cache;

class DashboardController extends Controller
{
    protected $charts;

    public function __construct(IChartsRepository $charts)
    {
        $this->charts = $charts;
    }
    public function index()
    {
        $range = Carbon::now();
        $range2 = Carbon::now()->subMonths(1);

        $area = $this->charts->SalesAreaChart($range, $range2);



        $data = Cache::remember('appointments', 10, function () {
            return Appointment::get();
        });
        $clients = Cache::remember('clients', 10, function () {
            return Client::get();
        });
        $prep = Invoice::where('created_at', '>', Carbon::now()->subMonth())->orderby('created_at', 'DESC');
        $dat= $prep->get();
        $total =  $dat->sum('total');

        $miniDonut['paid'] = $dat->where('status', 'paid')->count();
        $miniDonut['pending'] = $dat->where('status', 'pending')->count();
        $invoices  = $prep->paginate(9);


        $apps = $data->where('start_at', '>=', Carbon::now()->subWeek());
        $clients = Client::get();


        $stats = $this->charts->SimpleStats($apps);

        return view('mark.index', compact('invoices', 'area', 'miniDonut', 'apps', 'clients', 'stats', 'total'));
    }


    public function getBarData(Request $request)
    {
        $range = Carbon::now();
        $range2 = Carbon::now()->subMonths(1);

        $stats = $this->charts->AppointmentsBarChart($range, $range2);

        return response()->json($stats);
    }


    public function showrooms()
    {
        $showrooms = Showroom::with('users', 'invoices')->get();
        return view('mark.showrooms', compact('showrooms'));
    }
    public function show(Showroom $showroom)
    {
        $range = Carbon::now();
        $range2 = Carbon::now()->subMonths(1);

        $showroom->load('users', 'invoices.items', 'appointments');

      
        $area = $this->charts->SalesAreaChart($range, $range2, $showroom->id);
        $donut = $this->charts->AppointmentsDonutChart($showroom->appointments);
        
        return view('mark.singleshowroom', compact('showroom', 'area', 'donut'));
    }
}
