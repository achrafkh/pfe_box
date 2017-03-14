<?php

namespace App\Repo\Calendar;

use App\Client;
use App\Appointment;
use Carbon\Carbon;

class CalendarRepo implements ICalendarRepository
{
    public function getClientCalender($client_id)
    {
        $appointments = Appointment::where('client_id', $client_id)->get([
            'showroom_id','client_id','title', 'start_at', 'end_at','status','notes','id'
        ]);
        return $this->prepareOutput($appointments);
    }

    public function getShowRoomCalender($showroom_id)
    {
        $appointments = Appointment::where('showroom_id', $showroom_id)->get([
            'showroom_id','client_id','id','title', 'start_at', 'end_at','status','notes'
        ]);

        $appointments->load('client');
        return $this->prepareOutput($appointments);
    }

    public function getAgentCalender($agent_id)
    {
        $appointments = Appointment::where('user_id', $agent_id)->get([
            'showroom_id','client_id','id','title', 'start_at', 'end_at','status','notes'
        ]);
        return $this->prepareOutput($appointments);
    }


    public function prepareOutput($app)
    {
        $data = $app->map(function ($item) {
            return [
                    'id'  => $item->id,
                    'title'  => $item->title,
                    'showroom_id'  => $item->showroom_id,
                    'client_id'  => $item->client_id,
                    'start'  => $item->start_at,
                    'end'    => $item->end_at,
                    'allDay' => false,
                    'notes'     => $item->notes,
                    'color'  => ($item->status == 'done') ? '#10c390' : '#1751c3',
                    'client' => isset($item->client) ? $item->client->toarray() : null,
                    ];
        });

        return $data->toarray();
    }
}
