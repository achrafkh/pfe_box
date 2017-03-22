<?php

namespace App\Http\Controllers\Callcenter;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Client;
use Session;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        return view('op.dashboard');
    }
}
