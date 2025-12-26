@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Apply for Scholarship: {{ $scholarship->name }}</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('scholarships.apply.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="hidden" name="scholarship_id" value="{{ $scholarship->id }}">

        <div>
            <label for="course" class="block font-medium">Course</label>
            <input type="text" name="course" id="course" class="border rounded px-3 py-2 w-full" required>
        </div>

        <div>
            <label for="year_gap" class="block font-medium">Year Gap</label>
            <input type="number" name="year_gap" id="year_gap" class="border rounded px-3 py-2 w-full">
        </div>

        <div>
            <label for="academic_marks" class="block font-medium">Academic Marks</label>
            <input type="text" name="academic_marks" id="academic_marks" class="border rounded px-3 py-2 w-full" required>
        </div>

        <div>
            <label for="green_book_number" class="block font-medium">Green Book Number</label>
            <input type="text" name="green_book_number" id="green_book_number" class="border rounded px-3 py-2 w-full" required>
        </div>

        <div>
            <label for="parent_name" class="block font-medium">Parent Name</label>
            <input type="text" name="parent_name" id="parent_name" class="border rounded px-3 py-2 w-full" required>
        </div>

        <div>
            <label for="parent_contact" class="block font-medium">Parent Contact</label>
            <input type="text" name="parent_contact" id="parent_contact" class="border rounded px-3 py-2 w-full" required>
        </div>

        <div>
            <label for="phone_number" class="block font-medium">Your Phone Number</label>
            <input type="text" name="phone_number" id="phone_number" class="border rounded px-3 py-2 w-full" required>
        </div>

        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Apply
            </button>
        </div>
    </form>
    
</div>

@endsection


