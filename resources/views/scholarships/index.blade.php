<!-- resources/views/scholarships/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Scholarships</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">

    <h1 class="text-3xl font-bold mb-6">Scholarships</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('scholarships.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add New Scholarship</a>

    <table class="table-auto w-full bg-white shadow rounded">
        <thead>
            <tr class="bg-gray-200">
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Level</th>
                <th class="px-4 py-2">Deadline</th>
            </tr>
        </thead>
        <tbody>
            @forelse($scholarships as $scholarship)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $scholarship->id }}</td>
                    <td class="px-4 py-2">{{ $scholarship->name }}</td>
                    <td class="px-4 py-2">{{ $scholarship->level }}</td>
                    <td class="px-4 py-2">{{ $scholarship->deadline }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center px-4 py-2">No scholarships found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
