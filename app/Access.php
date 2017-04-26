<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
     protected $fillable = [
        'access_token', 'page_id','app_sercret','app_id'
    ];

}
