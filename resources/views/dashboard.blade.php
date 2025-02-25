<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Car Management Dashboard</h1>

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

        @if (auth()->user()->isAdmin())
            <!-- Admin UI -->
            <h2 class="text-xl mb-2">Admin Controls</h2>
            <form action="{{ route('cars.store') }}" method="POST" class="mb-4">
                @csrf
                <input type="text" name="name" placeholder="Car Name" class="border p-2" required>
                <input type="text" name="brand" placeholder="Brand" class="border p-2" required>
                <input type="number" name="year" placeholder="Year" class="border p-2" required>
                <input type="number" name="price" placeholder="Price" class="border p-2" required>
                <button type="submit" class="bg-green-500 text-white p-2">Add Car</button>
            </form>
        @endif

        <!-- Car List -->
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2">Name</th>
                    <th class="p-2">Brand</th>
                    <th class="p-2">Year</th>
                    <th class="p-2">Price</th>
                    @if (auth()->user()->isAdmin())
                        <th class="p-2">Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($cars as $car)
                    <tr>
                        <td class="p-2">{{ $car->name }}</td>
                        <td class="p-2">{{ $car->brand }}</td>
                        <td class="p-2">{{ $car->year }}</td>
                        <td class="p-2">{{ $car->price }}</td>
                        @if (auth()->user()->isAdmin())
                            <td class="p-2">
                                <form action="{{ route('cars.update', $car) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="name" value="{{ $car->name }}" class="border p-1" required>
                                    <input type="text" name="brand" value="{{ $car->brand }}" class="border p-1" required>
                                    <input type="number" name="year" value="{{ $car->year }}" class="border p-1" required>
                                    <input type="number" name="price" value="{{ $car->price }}" class="border p-1" required>
                                    <button type="submit" class="bg-yellow-500 text-white p-1">Update</button>
                                </form>
                                <form action="{{ route('cars.destroy', $car) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white p-1">Delete</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
