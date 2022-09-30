<?php

namespace App\Models;

class Disability extends BaseModel
{
    public function job()
    {
        return $this->belongsToMany(Job::class,'disabilities_jobs');
    }
    public function user()
    {
        return $this->belongsToMany(User::class,"disabilities_users");
    }
}
