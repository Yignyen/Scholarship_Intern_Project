<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Factories\HasFactory;
#defalut line below
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'level',
        'requirements',
        'deadline',
    ];

    // A scholarship can have many student applications
    public function studentScholarships()
    {
        return $this->hasMany(StudentScholarship::class);
    }
}


