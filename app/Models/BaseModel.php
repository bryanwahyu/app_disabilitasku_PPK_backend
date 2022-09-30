<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class BaseModel extends Model
{
    use SoftDeletes;

    protected $guarded=[];
    protected $hidden=['pivot'];
    
    protected $cast=[
        'created_at'=>'datetime:d-m-Y H:i',
        'updated_at'=>'datetime:d-m-Y H:i'
    ];
}
