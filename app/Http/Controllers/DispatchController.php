<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Ambulance;
use App\Models\Dispatch;
use Illuminate\Http\Request;

class DispatchController extends Controller
{
    public function create()
    {
        $patients = Patient::all();
        $ambulances = Ambulance::where('status', 'Available')->get();

        return view('dispatch.create', compact('patients', 'ambulances'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'ambulance_id' => 'required|exists:ambulances,id',
            'location' => 'required|string|max:255',
        ]);

        // Create a new dispatch record
        Dispatch::create($validated);

        // Update ambulance status to "In-Use"
        $ambulance = Ambulance::find($validated['ambulance_id']);
        $ambulance->update(['status' => 'In-Use']);

        return redirect()->route('dashboard')->with('success', 'Patient dispatched successfully!');
    }
}
