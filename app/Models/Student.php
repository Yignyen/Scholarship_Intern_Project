<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // A student can apply for many scholarships
    public function studentScholarships()
    {
        return $this->hasMany(StudentScholarship::class);
    }
}
