<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AuthModel extends Authenticatable
{
    use Notifiable,SoftDeletes;

    protected $guarded=[];

    protected $hidden=['password','remember_token','pivot'];

    protected $cast=[
        'created_at'=>'datetime:d-m-Y H:i',
        'updated_at'=>'datetime:d-m-Y H:i',
        'verify_at'=>'datetime:d-m-Y H:i'
    ];
}
