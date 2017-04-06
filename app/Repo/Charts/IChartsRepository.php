<?php

namespace App\Repo\Charts;

interface IChartsRepository
{
    public function AppointmentsBarChart($range, $range2);
    public function AppointmentsDonutChart($appointments);
    public function SalesAreaChart($range, $range2, $id = null);
    public function SimpleStats($appointments);
}
