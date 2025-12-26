<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


#default line below
use Illuminate\Database\Eloquent\Model;

class StudentScholarship extends Model
{
    use HasFactory;

    protected $table = 'student_scholarship';

    protected $fillable = [
        'student_id',
        'scholarship_id',
        'course',
        'year_gap',
        'academic_marks',
        'green_book_number',
        'parent_name',
        'parent_contact',
        'phone_number',
        'status',
    ];

    // Each application belongs to a student
    public function student()
    {
        return $this->belongsTo(Student::class);
    }


    // Each application belongs to a scholarship
    public function scholarship()
    {
        return $this->belongsTo(Scholarship::class);
    }
}
