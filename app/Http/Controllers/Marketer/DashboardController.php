<?php

namespace App\Http\Controllers\Marketer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\Charts\IChartsRepository;
use App\Appointment;
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
        $prep = Invoice::orderby('created_at', 'DESC');
        $dat= $prep->get();
        $miniDonut['paid'] = $dat->where('status', 'paid')->count();
        $miniDonut['canceled'] = $dat->where('status', 'canceled')->count();
        $miniDonut['pending'] = $dat->where('status', 'pending')->count();
        $invoices  = $prep->paginate(9);

        $donut = $this->charts->AppointmentsDonutChart($data);

        $apps = $data->where('start_at', '>=', Carbon::now()->subWeek());
        $clients = Client::get();


        $stats['week-total'] = $apps->count();
        $stats['week-success'] = $apps->where('status', 'done')->count();
        $stats['week-rescheduled'] = $apps->where('status', 'rescheduled')->count();
        $stats['success'] =  ($stats['week-success'] / $stats['week-total']) * 100;

        $rd1 = ($data->where("status", "done")->count() / $data->count()) * 100;
        $rd2 = ($data->where('start_at', '>', Carbon::now()->subMonth())->where('start_at', '<', Carbon::now())->count() / $data->count()) * 100;
        $rd3 = ($data->count() / $clients->count());

        $this_month = $data->where('start_at', '>=', Carbon::now()->subMonth())->where('start_at', '<=', Carbon::now())->where('status', 'done')->count();
        $last_month = $data->where('start_at', '>=', Carbon::now()->subMonths(2))->where('start_at', '<=', Carbon::now()->subMonth())->where('status', 'done')->count();

        $rd4 = (($this_month - $last_month) / $data->count())*100;
        return view('mark.index', compact('rd1', 'rd2', 'rd3', 'rd4', 'donut', 'invoices', 'area', 'miniDonut', 'apps', 'clients', 'stats'));
    }


    public function getBarData(Request $request)
    {
        $range = Carbon::now();
        $range2 = Carbon::now()->subMonths(1);

        $stats = $this->charts->AppointmentsBarChart($range, $range2);

        return response()->json($stats);
    }
}
