<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Ambulance; // Ensure you have this model
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Retrieve all patients and ambulances
        $patients = Patient::all();
        $ambulances = Ambulance::all();

        // Count the number of ambulances and patients
        $ambulanceCount = $ambulances->count();
        $patientsCount = $patients->count();

        // Pass the data to the view
        return view('dashboard', compact('patients', 'ambulances', 'ambulanceCount', 'patientsCount'));
    }
}