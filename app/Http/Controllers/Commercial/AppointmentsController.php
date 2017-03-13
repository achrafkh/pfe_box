<?php

namespace App\Http\Controllers\Commercial;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\Calendar\ICalendarRepository;

class AppointmentsController extends Controller
{
    protected $data;
    public function __construct(ICalendarRepository $calendar)
    {
        $this->data = $calendar;
    }
    public function index(Request $request)
    {
        $calendar = $this->data->getShowRoomCalender($request->user()->id);

      
        return view('com.appointments', compact('calendar'));
    }
}
