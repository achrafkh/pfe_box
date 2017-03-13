<?php

namespace App\Repo\Calendar;

interface ICalendarRepository
{
    public function getClientCalender($client_id);
    public function getAgentCalender($agent_id);
}
