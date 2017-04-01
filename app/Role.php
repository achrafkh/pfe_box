<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $fillable = [
        'title', 'fulltitle',
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
