<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyJobs extends BaseModel
{
    public function job()
    {
        return $this->belongTo(Jobs::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

