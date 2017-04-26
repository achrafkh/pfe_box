<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repo\facebook\IFacebookRepository;


class TestController extends Controller
{
    protected $app_secret;
    protected $app_id;

    public function __construct(IFacebookRepository $facebook)
    {
        $this->facebook = $facebook;
    }

    public function index(Request $request)
    {
        $form = '[{"type":"FULL_NAME"},{"type": "EMAIL"},{"type": "PHONE"},{"type": "COUNTRY"},{"type": "STREET_ADDRESS"},{"type": "CITY"}]';
        $access = 'EAAagwTQcy2gBABVRTGaEDttJJRc1OBpA36zZCyZCvWpfeff1yE8MP6JKXXPfQjKOPauFYx6CSFKLwBPlpIDAYclDp44Om8GjQZB76TBT76Qf4c0AJZBiQKKko5zVfoDJvdmQ0YT4ZB1heiPotwVtQUWVdKJAxGn3nPdOtXtzv6CPJGfuuuCnF';

      // dd($this->facebook->GivePerm());

        dd($this->facebook->Getleads('278228702630681',$access));

        $legalid = $this->facebook->getLegalContentId('1839105776414923',$access,'www.ttasqsdsqddsqd.ze');
        dd($this->facebook->CreateForm('1839105776414923',$access,'www.ttasqsdsqddsqd.ze','TEST4',$form,$legalid));
      /* dd($this->facebook->getLegalContentId('1839105776414923',$access,'www.ttasqsdsqddsqd.ze'));*/
    }


  
}
