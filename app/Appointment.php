<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'title', 'status', 'notes','client_id', 'showroom_id' , 'start_at','end_at',
    ];




    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
