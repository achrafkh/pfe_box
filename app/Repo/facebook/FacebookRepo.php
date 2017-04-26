<?php

namespace App\Repo\facebook;


class FacebookRepo implements IFacebookRepository
{
    protected $app_secret;
    protected $app_id;
    protected $client;
    protected $baseurl;

    public function __construct($app_secret,$app_id)
    {
        $this->app_secret = $app_secret;
        $this->app_id = $app_id;
        $this->baseurl = 'https://graph.facebook.com/v2.8/';
        $this->client = new \GuzzleHttp\Client();
    }

    public function getLegalContentId($pageid,$access,$url)
    {
            $response= $this->client->request('POST', $this->baseurl.$pageid.'/leadgen_legal_content', [
                'form_params' => [
                    'access_token' => $access,
                    'privacy_policy[url]' => $url,
                ]
            ]);

        return json_decode($response->getBody())->id;
    }

    public function CreateForm($pageid,$access,$url,$name,$form,$legalid)
    {
            $response= $this->client->request('POST', $this->baseurl.$pageid.'/leadgen_forms', [
                'form_params' => [
                    'access_token' => $access,
                    'name' => $name,
                    'follow_up_action_url' => $url,
                    'questions' => $form,
                    'legal_content_id' => $legalid,
                ]
            ]);

        return json_decode($response->getBody())->id;
    }
    public function GetForms($pageid,$access)
    {
        $response = $this->client->request('GET', $this->baseurl.$pageid.'/leadgen_forms?access_token='.$access);

        return json_decode($response->getBody())->data;
    }
    public function Getleads($formid,$access)
    {
        $response = $this->client->request('GET', $this->baseurl.$formid.'/leads?access_token='.$access);

        return json_decode($response->getBody())->data;
    }

    public function DeleteFrom($formid,$pageaccess)
    {
        $response = $this->client->request('DELETE', $this->baseurl.$formid.'?access_token='.$pageaccess);

        return json_decode($response->getBody());
    }

    public function GetForm($formid,$access)
    {
         $response = $this->client->request('GET', $this->baseurl.$formid.'?access_token='.$access);

        return json_decode($response->getBody());
    }

}
