<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function leads()
    {
        return $this->hasMany(Lead::class);
    }
}
