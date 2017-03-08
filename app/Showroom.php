<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Showroom extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function commercials()
    {
        return $this->users()->whereHas('role', function ($query) {
            $query->where('role', 'like', 'com');
        });
    }
}
