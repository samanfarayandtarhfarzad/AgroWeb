<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirm extends Model
{
    protected $table = 'confirms';

    protected $fillable = [
        'email',
        'phone',
        'code',
        'sent_email',
        'sent_phone',
        'sent_date',
        'code_used',
        'device_id',
        'repeat_time'
    ];

}
