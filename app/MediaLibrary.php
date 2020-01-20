<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaLibrary extends Model
{
    public $table = "medialibrary";
    
    protected $fillable = [
        'file_name',
        'media_type',
        'user_id',
        'description',
        'file_address'
      ];
}
