<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Client;
use Carbon\Carbon;

class SyncClientsWithFb implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $leads;
    
    public function __construct($leads)
    {
        $this->leads = $leads;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
         $data = [];
        foreach($this->leads as $index => $lead)
            {
                $data[$index]['firstname'] = explode(' ',$lead->field_data[0]->values[0])[0];
                $data[$index]['lastname'] =  explode(' ',$lead->field_data[0]->values[0])[1];
                $data[$index]['email'] = $lead->field_data[1]->values[0];
                $data[$index]['phone'] = $lead->field_data[2]->values[0];
                $data[$index]['src'] = "fb";
                $data[$index]['address'] = $lead->field_data[3]->values[0];
                $data[$index]['city'] = $lead->field_data[4]->values[0];
                $data[$index]['birthdate'] = null;
                $data[$index]['created_at'] = Carbon::now();
                $data[$index]['updated_at'] = Carbon::now();
                

            }
                $inputs = [];
                foreach($data as $client)
                {
                    if(Client::where('email','LIKE',$client['email'])->orWhere('phone',$client['phone'])->exists())
                    {
                        continue;
                    }
                    $inputs[] = $client;
                }
  
           $bool =  Client::insert($inputs);
    }
}
