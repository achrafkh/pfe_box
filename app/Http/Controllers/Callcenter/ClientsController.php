<?php

namespace App\Http\Controllers\Callcenter;

use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\Calendar\ICalendarRepository;
use App\Client;
use App\User;
use App\Showroom;
use Session;

class ClientsController extends Controller
{
    protected $data;
    
    public function __construct(ICalendarRepository $calendar)
    {
        $this->data = $calendar;
    }
    public function index()
    {
        return view('op.index')->with('clients', Client::paginate(8));
    }

    public function show(Client $client)
    {
        $calendar = $this->data->getClientCalender($client->id);
        $showrooms = Showroom::get();

        
        return view('op.showclient', compact('showrooms', 'client', 'calendar'));
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
