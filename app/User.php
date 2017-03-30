<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname', 'username', 'password','role_id','email','role_id','showroom_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $username = 'username';


    public function role()
    {
        return $this->belongsTo(Role::class);
    }
        public function showroom()
    {
        return $this->belongsTo(Showroom::class);
    }


    public function hasRole($role)
    {
        
        if($this->role->title != $role)
        {
            return false;
        }
        return true;
    }
}
