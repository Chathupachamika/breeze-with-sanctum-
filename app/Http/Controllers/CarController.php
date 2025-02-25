<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        if (auth()->user()->isAdmin()) {
            return view('admin-dashboard', compact('cars'));
        }
        return view('user-dashboard', compact('cars'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'year' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        Car::create($request->all());
        return redirect()->route('dashboard')->with('success', 'Car added successfully');
    }

    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'year' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $car->update($request->all());
        return redirect()->route('dashboard')->with('success', 'Car updated successfully');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('dashboard')->with('success', 'Car deleted successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $cars = Car::where('name', 'LIKE', "%{$query}%")
            ->orWhere('brand', 'LIKE', "%{$query}%")
            ->get();
        if (auth()->user()->isAdmin()) {
            return view('admin-dashboard', compact('cars'));
        }
        return view('user-dashboard', compact('cars'));
    }
}
