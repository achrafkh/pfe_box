<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\facebook\IFacebookRepository;
use App\Http\Requests\SettingsRequest;
use App\Access;

class FacebookController extends Controller
{
	protected $facebook;
    protected $settings;
	public function __construct(IFacebookRepository $repo)
    {
        $this->middleware('settings')->except('settings','setSettings');
        
    	$this->form = '[{"type":"FULL_NAME"},{"type": "EMAIL"},{"type": "PHONE"},{"type": "COUNTRY"},{"type": "STREET_ADDRESS"},{"type": "CITY"}]';
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
        return redirect('admin/pages');
    }
}
