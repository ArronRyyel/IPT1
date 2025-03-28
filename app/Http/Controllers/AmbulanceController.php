<?php

namespace App\Http\Controllers;

use App\Models\Ambulance;
use Illuminate\Http\Request;

class AmbulanceController extends Controller
{
    public function index()
    {
        $ambulances = Ambulance::all(); // Fetch all ambulances
        $ambulanceCount = Ambulance::count(); // Get the total count of ambulances
        return view('dashboard', compact('ambulances', 'ambulanceCount')); // Pass data to the view
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'license_plate' => 'required|string|max:255|unique:ambulances',
                'model' => 'required|string|max:255',
                'status' => 'required|in:Available,In-Use,Under Maintenance',
                'location' => 'required|string|max:255',
                'assigned_to' => 'nullable|exists:users,id',
            ]);
    
            Ambulance::create($validated);
    
            // Redirect to the dashboard with a success message
            return redirect()->route('dashboard')->with('success', 'Ambulance added successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    }

    public function show($id)
    {
        return Ambulance::find($id);
    }

    public function update(Request $request, $id)
    {
        $ambulance = Ambulance::find($id);
        $ambulance->update($request->all());
        return response()->json($ambulance, 200);
    }

    public function destroy($id)
    {
        Ambulance::destroy($id);
        return response()->json(null, 204);
    }
    public function create()
    {
        return view('ambulances.create'); 
    }
}
