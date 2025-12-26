<!-- resources/views/scholarships/create.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Scholarship</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">

    <h1 class="text-3xl font-bold mb-6">Create Scholarship</h1>

    <a href="{{ route('scholarships.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mb-4 inline-block">Back to List</a>

    @if ($errors->any())
        <div class="bg-red-200 text-red-800 p-3 mb-4 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('scholarships.store') }}" method="POST" class="bg-white p-6 rounded shadow-md w-1/2">
        @csrf
        <div class="mb-4">
            <label class="block mb-1 font-bold">Scholarship Name</label>
            <input type="text" name="name" class="w-full border px-3 py-2 rounded" value="{{ old('name') }}" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-bold">Level</label>
            <select name="level" class="w-full border px-3 py-2 rounded" required>
                <option value="">Select Level</option>
                <option value="UG" {{ old('level')=='UG' ? 'selected' : '' }}>Undergraduate</option>
                <option value="PG" {{ old('level')=='PG' ? 'selected' : '' }}>Postgraduate</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-bold">Deadline</label>
            <input type="date" name="deadline" class="w-full border px-3 py-2 rounded" value="{{ old('deadline') }}" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-bold">Requirements</label>
            <textarea name="requirements" class="w-full border px-3 py-2 rounded">{{ old('requirements') }}</textarea>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save Scholarship</button>
    </form>

</body>
</html>
