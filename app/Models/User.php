<?php

namespace App\Models;


class User extends AuthModel
{
    public function disabilites()
    {
        return $this->BelongsToMany(Disability::class,'disabilities_users');
    }
    public function apply()
    {
        return $this->hasMany(ApplyJobs::class);
    }
}
