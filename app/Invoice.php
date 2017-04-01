<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
       'total','status','showroom_id','appointment_id',
    ];

    public function showroom()
    {
        return $this->belongsTo(Showroom::class);
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function items()
    {
        return $this->hasMany(InvoiceLine::class);
    }
}
