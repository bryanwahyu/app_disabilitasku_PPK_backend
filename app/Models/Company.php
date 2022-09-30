<?php

namespace App\Models;

class Company extends BaseModel
{
    public function author()
    {
        return $this->belongsTo(Admin::class,'author_id');
    }
    public function job()
    {
        return $this->hasMany(Job::class);
    }
}
