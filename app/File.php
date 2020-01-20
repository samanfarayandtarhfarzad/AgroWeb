<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public $table = "files";

    protected $fillable = [
        'id', 
        'file_name', 
        'file_size', 
        'file_type',  
        'file_format',  
        'file_description',  
        'file_address',  
        'user_id'
    ];
}
