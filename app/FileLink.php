<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileLink extends Model
{
    //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'filename', 'fileextension', 'filecode','ipuploaded','downloadlink','displaylink',
    ];
}
