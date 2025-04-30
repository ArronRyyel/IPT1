<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
{
    $patients = Patient::all(); // Fetch all patients
    $patientsCount = Patient::count(); // Get the total count of patients
    $ambulances = \App\Models\Ambulance::all(); // Fetch all ambulances
    $ambulanceCount = $ambulances->count(); // Get the total count of ambulances

    return view('dashboard', compact('patients', 'patientsCount', 'ambulances', 'ambulanceCount')); // Pass data to the view
}

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:255',
            'medical_history' => 'nullable|string',
        ]);
    
        Patient::create($validatedData);
    
        return redirect()->route('patients.index')->with('success', 'Patient added successfully!');
    }

    public function show($id)
    {
        return Patient::find($id);
    }

    public function update(Request $request, $id)
    {
        $patient = Patient::find($id);
        $patient->update($request->all());
        return response()->json($patient, 200);
    }

    public function destroy($id)
    {
        Patient::destroy($id);
        return response()->json(null, 204);
    }

    public function create()
    {
        return view('patients.create'); 
    }
}