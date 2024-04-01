<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function collegeYears()
    {
        return $this->hasMany(CollegeYear::class);
    }

    public function subjects()
    {
        return $this->hasManyThrough(Subject::class, CollegeYear::class);
    }
}
