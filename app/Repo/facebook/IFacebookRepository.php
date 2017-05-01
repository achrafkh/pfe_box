<?php

namespace App\Repo\facebook;

interface IFacebookRepository
{
    public function getLegalContentId($pageid,$access,$url);
    public function CreateForm($pageid,$access,$url,$name,$form,$legalid);
    public function GetForms($pageid,$access);
    public function Getleads($formid,$access);
    public function DeleteFrom($formid,$access);
    public function GetForm($formid,$access);
    public function getPageToken($access);
    public function subscribe($pagetoken,$pageid,$url);
    public function GetLead($leadid,$acess);
}
