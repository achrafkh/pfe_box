<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceLine extends Model
{
	protected $fillable = [
        'description','quantity', 'price', 'invoice_id',
    ];
    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
