<?php

namespace App\Repo\Charts;

use Carbon\Carbon;
use Cache;
use DB;

class ChartsRepo implements IChartsRepository
{
    public function AppointmentsBarChart($range, $range2)
    {
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
            ->take(5);
    }

    public function SalesAreaChart($range, $range2, $id = null)
    {
        $data =  DB::table('invoices')
            ->where('created_at', '<', $range)
            ->where('created_at', '>', $range2)
            ->groupBy('period')
            ->orderBy('period', 'DESC');
        if ($id) {
            $data->where('showroom_id', $id);
        }
        $chartData = $data->get([
            DB::raw('week(created_at) as period'),
            DB::raw("SUM(CASE WHEN status = 'paid' THEN total ELSE 0 END) as total"),
        ]);

        return $chartData->take(5);
    }

    public function SimpleStats($appointments)
    {
        $stats['week-total'] = $appointments->count();
        $stats['week-success'] = $appointments->where('status', 'done')->count();
        $stats['week-rescheduled'] = $appointments->where('status', 'rescheduled')->count();
        $stats['success'] =  ($stats['week-success'] / $stats['week-total']) * 100;

        return $stats;
    }

    public function AppointmentsDonutChart($appointments)
    {
        $donut[] = ["label" => "done","value" => $appointments->where("status", "done")->count()];
        $donut[] = ["label" => "rescheduled","value" => $appointments->where("status", "rescheduled")->count()];
        $donut[] = ["label" => "pending","value" => $appointments->where("status", "pending")->count()];

        return $donut;
    }
}
