<?php

namespace App\Models;


class Job extends BaseModel
{
    public function apply()
    {
        return $this->hasMany(ApplyJobs::class);
    }
    public function disability()
    {
        return $this->belongsToMany(Disability::class,'disabilities_jobs');
    }
    public function category()
    {
        return $this->belongsToMany(Category::class,'category_jobs');
    }
    public function authors()
    {
        return $this->belongsTo(Admin::class,'author_id');
    }
    
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
