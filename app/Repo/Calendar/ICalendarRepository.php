<?php

namespace App\Repo\Calendar;

interface ICalendarRepository
{
    public function getClientCalender($client_id);
    public function getAgentCalender($agent_id);
    public function getShowRoomCalenderObj($showroom_id);
    public function getShowRoomCalender($showroom_id);
    public function prepareOutputWithClient($app); 
    public function prepareOutputWithAll($app);
    public function getAll();
    public function getAllObj();
}
