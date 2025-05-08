<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Ambulance; 
use App\Models\Dispatch; 
use Illuminate\Http\Request;

class DashboardController extends Controller
{
public function index()
{
    $patients = Patient::all();
    $patientsCount = Patient::count();
    $ambulances = Ambulance::all();
    $ambulanceCount = $ambulances->count();
    $dispatches = Dispatch::with(['ambulance', 'patient'])->get();

    return view('dashboard', compact('patients', 'patientsCount', 'ambulances', 'ambulanceCount', 'dispatches'));
}
}