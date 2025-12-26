<?php

namespace App\Http\Controllers;

use App\Models\Scholarship;
use Illuminate\Http\Request;

class ScholarshipController extends Controller
{
    // Show all scholarships
    public function index()
    {
        $scholarships = Scholarship::all();
        return view('scholarships.index', compact('scholarships'));
    }

    // Show create form
    public function create()
    {
        return view('scholarships.create');
    }

    // Store scholarship
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'level' => 'required|in:UG,PG',
            'deadline' => 'required|date',
        ]);

        Scholarship::create($request->all());

        return redirect()->route('scholarships.index')
            ->with('success', 'Scholarship created successfully');
    }
}
