<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use App\Models\StudentScholarship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentScholarshipController extends Controller
{
    // Show application form
    public function apply($id)
    {
        $scholarship = Scholarship::findOrFail($id);
        return view('applications.apply', compact('scholarship'));
    }

    // Store application
    public function store(Request $request)
    {
        $request->validate([
            'scholarship_id' => 'required',
            'course' => 'required',
            'academic_marks' => 'required',
            'green_book_number' => 'required',
            'phone_number' => 'required',
        ]);

        StudentScholarship::create([
            'student_id' => auth()->id(),
            'scholarship_id' => $request->scholarship_id,
            'course' => $request->course,
            'year_gap' => $request->year_gap,
            'academic_marks' => $request->academic_marks,
            'green_book_number' => $request->green_book_number,
            'parent_name' => $request->parent_name,
            'parent_contact' => $request->parent_contact,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->back()->with('success', 'Application submitted');
    }
}
