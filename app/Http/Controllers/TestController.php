<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repo\IFacebookRepository;

class TestController extends Controller
{
    public function __construct(IFacebookRepository $facebook)
    {
        $this->facebook = $facebook;
    }

    public function index(Request $request)
    {
        $pageid = '1450916951844506';

        

        $formid='887963111346537';


        $short_access= $request->access;

        
        $access_token = $this->facebook->getToken($short_access);

        //dd($this->facebook->getForms($pageid, $access_token));

        dd($this->facebook->getLeads($access_token, $formid));
    }
}
