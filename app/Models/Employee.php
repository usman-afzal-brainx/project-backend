<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function designation()
    {
        return $this->hasOne(Designation::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
