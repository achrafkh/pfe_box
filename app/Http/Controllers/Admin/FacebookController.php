<?php

namespace App\Http\Controllers\Admin;

use App\Repo\facebook\IFacebookRepository;
use App\Http\Requests\SettingsRequest;
use App\Http\Controllers\Controller;
use App\Jobs\SyncClientsWithFb;
use Illuminate\Http\Request;
use App\Client;
use App\Access;
use Session;


class FacebookController extends Controller
{
	protected $facebook;
    protected $settings;
	public function __construct(IFacebookRepository $repo)
    {
        $this->middleware('settings')->except('settings','setSettings','HandleWebhook');
        
    	$this->form = '[{"type":"FULL_NAME"},{"type": "EMAIL"},{"type": "PHONE"},{"type": "STREET_ADDRESS"},{"type": "CITY"}]';
        $this->settings = Access::first();

    	$this->facebook = $repo;
    }

    public function index()
    {
    	$forms = $this->facebook->GetForms($this->settings->page_id,$this->settings->access_token);
    	return view('admin.pages.index',compact('forms'));
    }

    public function getLeads($id)
    {
    	$leads = $this->facebook->Getleads($id,$this->settings->access_token);
    	$form = $this->facebook->GetForm($id,$this->settings->access_token);

    	return view('admin.pages.leads',compact('leads','form'));
    }
     public function showForm()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $legalid = $this->facebook->getLegalContentId($this->settings->page_id,$this->settings->access_token,$request->legalurl);
        $formid = $this->facebook->CreateForm($this->settings->page_id,$this->settings->access_token,$request->redirect,$request->name,$this->form,$legalid);
        Session::flash('flash', 'Form has Been Added Succesfully ');
        return redirect('admin/leads/'.$formid);
    }

    public function settings()
    {
        return view('admin.pages.settings');
    }

    public function setSettings(SettingsRequest $request)
    {
        Access::truncate();
        $settings = Access::create($request->all());
        if(!$settings)
        {
            return redirect('admin/pages/settings');
        }
        $this->facebook->subscribe($request->app_id.'|'.$request->app_sercret,$request->page_id,url('/getleads'));
        Session::flash('flash', 'Access details Updated Succesfully');
        return redirect('admin/pages');
    }

    public function edit()
    {
        $data = $this->settings;
        return view('admin.pages.edit',compact('data'));
    }

    public function sync(Request $request)
    {
        $leads = $this->facebook->Getleads($request->formid,$this->settings->access_token);

       dispatch(new SyncClientsWithFb($leads));
       
       return response()->json(['success'=> true]);

    }
    public function getPageToken()
    {
        $data =  $this->facebook->getPageToken($this->settings->access_token);
        $token = null;
        foreach($data as $row)
        {
            if($row->id == $this->settings->page_id)
            {
                $token = $row->access_token;

                $access = Access::first();
                $access->page_token = $token;
                $access->save();
                break;
            }
        }

        return $token;
    }
    public function deleteFrom($id,Request $request)
    {
        if(!isset($this->settings->page_token))
        {
            $this->settings->page_token = $this->getPageToken();
        }
        $this->facebook->DeleteFrom($id,$this->settings->page_token);

        Session::flash('flash', 'Form has Been Removed Succesfully ');
        return redirect('admin/pages');

    }

    public function HandleWebhook(Request $request)
    {
        $challenge = $request->hub_challenge;
        $data = $request->all();

        foreach($data['entry'] as $entry)
        {
            foreach($entry['changes'] as $val)
            {
                $leadgenid = $val['value']['leadgen_id'];
                file_put_contents('data.txt', print_r($leadgenid,true), FILE_APPEND | LOCK_EX);
                break;
            }
            
        }

    }
    public function validateWH(Request $request)
    {
        $challenge = $request->hub_challenge;
        echo $challenge;
        exit();
    }

    public function getLead($id)
    {
        $lead = $this->facebook->GetLead($id,$this->settings->access_token);

        return  $lead;
    }
}
