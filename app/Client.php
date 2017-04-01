<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'firstname', 'lastname', 'phone','city' ,'address' , 'birthdate' , 'email',
    ];

    
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

}
