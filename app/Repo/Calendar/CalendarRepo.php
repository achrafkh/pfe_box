<?php

namespace App\Repo\Calendar;

use App\Client;
use App\Appointment;
use Carbon\Carbon;

class CalendarRepo implements ICalendarRepository
{
    public function getClientCalender($client_id)
    {
        $appointments = Appointment::where('client_id', $client_id)->get(['title', 'start_at', 'end_at','status','notes','id']);
        return $this->prepareOutput($appointments);
    }

    public function getShowRoomCalender($showroom_id)
    {
        $appointments = Appointment::where('showroom_id', $showroom_id)->get(['id',
        'title', 'start_at', 'end_at','status','notes']);
        return $this->prepareOutput($appointments);
    }

    public function getAgentCalender($agent_id)
    {
        $appointments = Appointment::where('user_id', $agent_id)->get(['id','title', 'start_at', 'end_at','status','notes']);
        return $this->prepareOutput($appointments);
    }


    public function prepareOutput($app)
    {
        $data = $app->map(function ($item) {
            return [
                    'appid'  => $item->id,
                    'title'  => $item->title,
                    'start'  => $item->start_at,
                    'end'    => $item->end_at,
                    'allDay' => false,
                    'notes'     => $item->notes,
                    'color'  => ($item->status == 'done') ? '#10c390' : '#1751c3',
                    ];
        });

        return $data->toarray();
    }
}
