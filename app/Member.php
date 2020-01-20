<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';

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
        'status'
    ];
}
