<?php

namespace App\Http\Controllers\Marketer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Appointment;
use App\Client;
use Carbon\Carbon;
use DB;
use Cache;

class DashboardController extends Controller
{
    public function index()
    {
        $data = Cache::remember('appointments', 60, function () {
            return Appointment::get();
        });
        $clients = Cache::remember('clients', 60, function () {
            return Client::get();
        });

        $donut[] = ["label" => "done","value" => $data->where("status", "done")->count()];
        $donut[] = ["label" => "rescheduled","value" => $data->where("status", "rescheduled")->count()];
        $donut[] = ["label" => "pending","value" => $data->where("status", "pending")->count()];

        $rd1 = ($data->where("status", "done")->count() / $data->count()) * 100;
        $rd2 = ($data->where('start_at', '>', Carbon::now()->subMonth())->where('start_at', '<', Carbon::now())->count() / $data->count()) * 100;
        $rd3 = ($data->count() / $clients->count());

        $this_month = $data->where('start_at', '>=', Carbon::now()->subMonth())->where('start_at', '<=', Carbon::now())->where('status', 'done')->count();
        $last_month = $data->where('start_at', '>=', Carbon::now()->subMonths(2))->where('start_at', '<=', Carbon::now()->subMonth())->where('status', 'done')->count();

        $rd4 = (($this_month - $last_month) / $data->count())*100;
        return view('mark.index', compact('rd1', 'rd2', 'rd3', 'rd4', 'donut'));
    }


    public function getBarData(Request $request)
    {
        $range = Carbon::now();
        $range2 = Carbon::now()->subMonths(1);

        $stats = Cache::remember('barChart', 60, function () use ($range, $range2) {
            return DB::table('appointments')
            ->where('end_at', '<', $range)
            ->where('end_at', '>', $range2)
            ->groupBy('date')
            ->orderBy('date', 'DESC')
            ->get([
            DB::raw('week(end_at) as date'),
            DB::raw("Count(case status when 'pending' then 1 else null end) as pending"),
            DB::raw("Count(case status when 'done' then 1 else null end) as done"),
            DB::raw("Count(case status when 'rescheduled' then 1 else null end) as rescheduled"),
            ])
            ->take(4)->toJson();
        });
        

        return $stats;
    }
}
