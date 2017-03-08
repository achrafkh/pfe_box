<?php

namespace App\Repo\Calendar;

interface ICalendarRepository
{
    public function getClientCalender($client_id);
}
