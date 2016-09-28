<?php

namespace App\Profile;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ProfileDetails extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date_of_birth',
        'firstname',
        'lastname',
        'nickname',
        'country',
        'region',
        'city',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
