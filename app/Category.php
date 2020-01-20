<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = [
        'category_title',
        'category_text',
        'file_id',
        'file_address',
        'category_Privilege',
        'category_status'
    ];
}
