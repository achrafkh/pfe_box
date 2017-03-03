<?php

namespace App\Repo;

interface IFacebookRepository
{
    public function getToken($short_access);
    public function getLeads($access_token, $formid);
    public function getForms($pageid, $access_token);
}
