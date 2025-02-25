<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">User Dashboard - Car Management</h1>

        <!-- Navigation -->
        <nav class="mb-4">
            <a href="{{ route('dashboard') }}" class="text-blue-500">Dashboard</a> |
            <a href="{{ route('profile.edit') }}" class="text-blue-500">Profile</a> |
            <a href="{{ route('logout') }}" class="text-blue-500">Logout</a>
        </nav>

        @if (session('success'))
            <div class="bg-green-500 text-white p-2 mb-4">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="bg-red-500 text-white p-2 mb-4">{{ session('error') }}</div>
        @endif

        <!-- Search Bar -->
        <form action="{{ route('cars.search') }}" method="GET" class="mb-4">
            <input type="text" name="query" placeholder="Search cars..." class="border p-2">
            <button type="submit" class="bg-blue-500 text-white p-2">Search</button>
        </form>

        <!-- Car List -->
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2">Name</th>
                    <th class="p-2">Brand</th>
                    <th class="p-2">Year</th>
                    <th class="p-2">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <td class="p-2">{{ $car->name }}</td>
                        <td class="p-2">{{ $car->brand }}</td>
                        <td class="p-2">{{ $car->year }}</td>
                        <td class="p-2">{{ $car->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
