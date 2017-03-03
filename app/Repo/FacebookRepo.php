<?php

namespace App\Repo;

use FacebookAds\Api;
use FacebookAds\Object\AdUser;
use \Facebook\Facebook;

class FacebookRepo implements IFacebookRepository
{
    protected $app_secret;
    protected $app_id;
    protected $client;
    protected $baseurl;

    public function __construct()
    {
        $this->app_secret = env('APP_SECRET');
        $this->app_id = env('APP_ID');
        $this->baseurl = 'https://graph.facebook.com/v2.8/';

        $this->client = new \GuzzleHttp\Client();
    }

    public function getToken($short_access)
    {
        $response = $this->client->request('GET', $this->baseurl.'oauth/access_token?grant_type=fb_exchange_token&client_id='.$this->app_id.'&client_secret='.$this->app_secret.'&fb_exchange_token='.$short_access);

        return json_decode($response->getBody())->access_token;
    }


    public function getLeads($access_token, $formid)
    {
        $response = $this->client->request('GET', $this->baseurl.$formid.'/leads?access_token='.$access_token);

        return json_decode($response->getBody())->data[0];
    }

    public function getForms($pageid, $access_token)
    {
        $response = $this->client->request('GET', $this->baseurl.$pageid.'/leadgen_forms?access_token='.$access_token);

        return json_decode($response->getBody())->data;
    }
}
