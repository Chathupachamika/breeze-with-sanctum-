<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::query();

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('brand', 'like', "%{$search}%")
                  ->orWhere('model', 'like', "%{$search}%")
                  ->orWhere('year', 'like', "%{$search}%");
            });
        }

        $cars = $query->paginate(10);
        return view('cars.index', compact('cars'));
    }

    public function create()
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }
        return view('cars.create');
    }

    public function store(Request $request)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|string|max:4',
            'color' => 'required|string|max:255',
            'daily_rate' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url',
            'is_available' => 'boolean'
        ]);

        Car::create($validated);

        return redirect()->route('cars.index')
            ->with('success', 'Car added successfully');
    }

    public function edit(Car $car)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }
        return view('cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        $validated = $request->validate([
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|string|max:4',
            'color' => 'required|string|max:255',
            'daily_rate' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url',
            'is_available' => 'boolean'
        ]);

        $car->update($validated);

        return redirect()->route('cars.index')
            ->with('success', 'Car updated successfully');
    }

    public function destroy(Car $car)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403);
        }

        $car->delete();

        return redirect()->route('cars.index')
            ->with('success', 'Car deleted successfully');
    }
}
