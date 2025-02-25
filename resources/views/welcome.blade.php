<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container mx-auto p-4">
        @if (auth()->check())
            <h1>Welcome, {{ auth()->user()->name }}!</h1>
            <a href="{{ route('dashboard') }}" class="bg-blue-500 text-white p-2">Go to Dashboard</a>
        @else
            <h1>Welcome to Car Management</h1>
            <a href="{{ route('login') }}" class="bg-blue-500 text-white p-2">Login</a>
            <a href="{{ route('register') }}" class="bg-green-500 text-white p-2">Register</a>
        @endif
    </div>
</body>
</html>
