<?php

namespace App\Http\Controllers\Callcenter;

use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Http\Controllers\Controller;
use App\Repo\Calendar\ICalendarRepository;
use App\Client;
use App\User;
use App\Showroom;
use Session;

class ClientsController extends Controller
{
    protected $test;
    
    public function __construct(ICalendarRepository $calendar)
    {
        $this->test = $calendar;
    }
    public function index()
    {
        return view('op.index')->with('clients', Client::paginate(8));
    }

    public function show(Client $client)
    {
        $calendar = $this->test->getClientCalender($client->id);
        $showrooms = Showroom::get();
        $commercials = User::whereHas('role', function ($query) {
            $query->where('title', 'like', 'com');
        })->get();
        return view('op.showclient', compact('showrooms', 'client', 'calendar', 'commercials'));
    }

    public function create()
    {
        return view('op.createclient');
    }


    public function store(CreateClientRequest $request)
    {
        if (!Client::create($request->all())) {
            Session::flash('error', 'Something went Wrong');
        }

        Session::flash('success', 'Created successfully');
        return redirect()->route('op');
    }

    public function edit(Client $client)
    {
        return view('op.editclient', compact('client'));
    }

    public function update(UpdateClientRequest $request)
    {
        $client = Client::where('id', $request->id)->update($request->except('id', '_token'));
        if (!$client) {
            Session::flash('error', 'Something went Wrong');
        }
        Session::flash('success', 'Updated Successfully');
        return redirect()->route('op');
    }
    
    public function delete(Client $client)
    {
        if (!$client->delete()) {
            Session::flash('error', 'Something went Wrong');
        }
        Session::flash('success', 'Deleted Successfully');
        return redirect()->route('op');
    }
}
