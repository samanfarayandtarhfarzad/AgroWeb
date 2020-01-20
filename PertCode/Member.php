<?php

namespace App\Member;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'username',
        'phone',
        'email',
        'password',
        'firstname',
        'lastname',
        'roleid',
        'city_id',
        'zipcode',
        'gender',
        'birthdate',
        'lastlogin',
        'status',
        'remember_token'
    ];
}
