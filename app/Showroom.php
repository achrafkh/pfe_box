<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Showroom extends Model
{
    protected $fillable = [
        'city',
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class)->orderBy('created_at', 'desc');
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class)->orderBy('end_at', 'desc');
    }
}
